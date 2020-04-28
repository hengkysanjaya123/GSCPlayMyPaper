$(() => {
    let url = $("meta[name='home_url']").attr('content');
    let xml = $("meta[name='xml']").attr('content');
    let vrvToolkit = new verovio.toolkit();
    let page = 1;
    let zoom = 60;
    let pageHeight = 2970;
    let pageWidth = 2100;

    ////////////////////////////////////////////////
    /* A letiable for storing the highlighted ids */
    ////////////////////////////////////////////////
    let ids = [];
    let isPlaying = false;

    function setOptions() {
        pageHeight = $(document).height() * 100 / zoom;
        pageWidth = $(document).width() * 100 / zoom;
        options = {
            pageHeight: pageHeight,
            pageWidth: pageWidth,
            scale: zoom,
            adjustPageHeight: true
        };
        vrvToolkit.setOptions(options);
    }

    function loadData(data) {
        setOptions();
        vrvToolkit.loadData(data);

        page = 1;
        loadPage();
    }

    function loadPage() {
        svg = vrvToolkit.renderToSVG(page, {});
        $("#output").html(svg);

        ////////////////////////////////////////
        /* Bind a on click event to each note */
        ////////////////////////////////////////
        $(".note").click(function () {
            let id = $(this).attr("id");
            let time = vrvToolkit.getTimeForElement(id);
            $("#midi-player").midiPlayer.seek(time);
        });
    }

    function loadFile() {
        file = (url + '/' + 'xml/' + xml + '/' + xml + '.xml').replace('/index.php', '');
        $.ajax({
            url: file,
            dataType: "text",
            success: function (data) {
                loadData(data);
            }
        });
    }

    ////////////////////////////////////////////
    /* A function that start playing the file */
    ////////////////////////////////////////////
    function play_midi() {
        if (isPlaying == false) {
            let base64midi = vrvToolkit.renderToMIDI();
            let song = 'data:audio/midi;base64,' + base64midi;
            $("#player").show();
            $("#player").midiPlayer.play(song);
            isPlaying = true;
        }
    }

    //////////////////////////////////////////////////////
    /* Two callback functions passed to the MIDI player */
    //////////////////////////////////////////////////////
    let midiUpdate = function (time) {
        // time needs to - 400 for adjustment
        let vrvTime = Math.max(0, time - 400);
        let elementsattime = vrvToolkit.getElementsAtTime(vrvTime);
        if (elementsattime.page > 0) {
            if (elementsattime.page != page) {
                page = elementsattime.page;
                loadPage();
            }
            if ((elementsattime.notes.length > 0) && (ids != elementsattime.notes)) {
                ids.forEach(function (noteid) {
                    if ($.inArray(noteid, elementsattime.notes) == -1) {
                        $("#" + noteid).attr("fill", "#000").attr("stroke", "#000");
                    }
                });
                ids = elementsattime.notes;
                ids.forEach(function (noteid) {
                    if ($.inArray(noteid, elementsattime.notes) != -1) {
                        $("#" + noteid).attr("fill", "#c00").attr("stroke", "#c00");
                        ;
                    }
                });
            }
        }
    }

    let midiStop = function () {
        ids.forEach(function (noteid) {
            $("#" + noteid).attr("fill", "#000").attr("stroke", "#000");
        });
        $("#player").hide();
        isPlaying = false;
    }


    $(window).keyup(function (e) {
        ////////////////////////////////
        /* Key events 'p' for playing */
        ////////////////////////////////

        if (e.keyCode == 80) {
            play_midi();
        }
    });

    $("#play").on('click', () =>{
        play_midi();
    });

    $(window).resize(function () {
        applyZoom();
    });

    $("#player").midiPlayer({
        color: "#c00",
        onUpdate: midiUpdate,
        onStop: midiStop,
        width: 250
    });

    loadFile();

    $("#reload").on("click", () => {
       let instrument = $("#instrument").val();
       location.search="?instrument=" + instrument;
    });

    $("#home").on("click", () => {
        location.href = location.origin;
    })
})
