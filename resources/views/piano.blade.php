<link rel="stylesheet" href="{{asset('piano/CG.css')}}">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

<div class="start-dialog">
    <div class="start-dialog-center">
        <p>
            Here are the different ways you can interact with the piano: <br>
            - Use the Q - P key to play the right hand and Z - M key for the left hand <br>
            - Use a mouse to click on the notes <br>
            - Use touch screen to play the piano

        </p>

        <button id="start-button">
            Play
        </button>
    </div>


    <div id="particle">
        <canvas></canvas>
    </div>
</div>
<div class="sidebar" style="display:none">

    <div class="form-group">
        <select name="songs" id="songs" class="form-control"></select>
    </div>
    <div class="Buttons">
        <button id="play-button">
            Play
        </button>
        <button id="pause-button">
            Pause
        </button>
        <button id="stop-button">
            Stop
        </button>
        <button id="tutorial-button">
            Tutorial Mode
        </button>
    </div>

    <div class="toggle-button">
        <i class="icon ion-ios-arrow-dropright"></i>
    </div>
</div>


<!-- <div class="sidebar">
		<button>

		</button>
	</div> -->


<!-- three js (graphic and animation) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/102/three.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
<script src="{{asset('piano/js/THREE/OBJLoader.js')}}"></script>

<!-- extras -->
<script src="{{asset('piano/js/base64binary.js')}}"></script>
<script src="{{asset('piano/js/Window/DOMLoader.script.js')}}"></script>

<!-- jasmid -->
<script src="{{asset('piano/js/jasmid/stream.js')}}"></script>
<script src="{{asset('piano/js/jasmid/midifile.js')}}"></script>
<script src="{{asset('piano/js/jasmid/replayer.js')}}"></script>

<!-- midi -->
<script src="{{asset('piano/js/MIDI/AudioDetect.js')}}"></script>
<script src="{{asset('piano/js/MIDI/LoadPlugin.js')}}"></script>
<script src="{{asset('piano/js/MIDI/Plugin.js')}}"></script>
<script src="{{asset('piano/js/MIDI/Player.js')}}"></script>
<script src="{{asset('piano/js/MIDI/Loader.js')}}"></script>

{{--<script src="{{asset('piano/js/paper.js')}}"></script>--}}

<script>


    var scene = new THREE.Scene();

    var Spin = false;

    // SETTINGS
    // length of white in keyboard
    var amt_length = 47;
    var tutorial = false;
    var tutorial_data = [];

    // pivot
    var pivot = null;
    var degree = 0;

    // music settings
    var octave = 0;
    var octave_loc = 0;

    // camera settings
    var camera = new THREE.PerspectiveCamera(100, window.innerWidth / window.innerHeight, 1, 1000)
    camera.position.z = 25;
    camera.position.y = 15;
    camera.rotation.x = 0;

    var renderer = new THREE.WebGLRenderer({antialias: true});
    renderer.setClearColor("#FFFFFF");
    renderer.setSize(window.innerWidth, window.innerHeight);

    document.body.appendChild(renderer.domElement);

    window.addEventListener('resize', () => {
        renderer.setSize(window.innerWidth, window.innerHeight);
        camera.aspect = window.innerWidth / window.innerHeight;

        camera.updateProjectionMatrix();
    })

    // raycaster "to know where that are hit"
    var raycaster = new THREE.Raycaster();

    var nodeGroupWhite = new THREE.Group();
    var nodeGroupBlack = new THREE.Group();

    var geometry = new THREE.BoxGeometry(0.9, 0.5, 3.55);
    geometry.translate(0, 0, 1);

    var black = new THREE.BoxGeometry(0.45, 0.5, 2.4);
    black.translate(0, 0, 0.75);

    //keyboard settings
    meshX = (-16.5 / 38) * amt_length;
    meshX2 = meshX + 0.5;
    meshZ = 11.5;
    meshY = 9.5;
    var data = []

    // white tuts for keyboard
    for (var i = 0; i < amt_length; i++) {
        var material = new THREE.MeshLambertMaterial({color: 0xFFFFFF});
        var mesh = new THREE.Mesh(geometry, material);
        mesh.position.x = meshX;
        mesh.position.y = meshY;
        mesh.position.z = meshZ;
        mesh.userData = {NAME: "Node", NODECOLOR: "White", NODEID: i, PRESSED: false};
        nodeGroupWhite.add(mesh);
        meshX += 0.92;
    }
    scene.add(nodeGroupWhite);

    // black tuts for keyboard
    for (var i = 0, j = 0; i < amt_length - 1; i++, j++) {
        if (i % 7 == 2 || i % 7 == 6) {
            meshX2 += 0.92;
            j--;
        } else {
            var material2 = new THREE.MeshLambertMaterial({color: 0x000000});
            var mesh = new THREE.Mesh(black, material2);
            mesh.position.x = meshX2;
            mesh.position.y = meshY + 0.2;
            mesh.position.z = meshZ - 0.2;
            mesh.userData = {NAME: "Node", NODECOLOR: "Black", NODEID: j, PRESSED: false};
            nodeGroupBlack.add(mesh);
            meshX2 += 0.92;
        }
    }
    scene.add(nodeGroupBlack);

    // load piano
    var objLoader = new THREE.OBJLoader();
    objLoader.load('piano/Piano.obj', function (object) {
        object.position.y = -6;
        object.position.z = -7.5;
        object.scale.set((18.5 / 38) * amt_length, 18.5, 18.5);
        object.userData = {NAME: "PIANO"};
        scene.add(object);

        pivot = object.position;
    });

    // light settings
    var light = new THREE.PointLight(0xFFFFFF, 1, 1000)
    light.position.set(10, 30, 20);
    light.rotation.x = -Math.PI / 2;
    light.rotation.z = -Math.PI;
    scene.add(light);

    function fix_object_color(object) {
        if (object.userData.NODECOLOR == "White") {
            object.material.color.set('rgb(255, 255, 255)');
        } else if (object.userData.NODECOLOR == "Black") {
            object.material.color.set('rgb(0, 0, 0)');
        }
    }

    function nodeDown(object, note, userInput = true) {
        if (!object.userData.PRESSED) {
            object.userData.PRESSED = true;
            this.tl = new TimelineMax();
            this.tl.to(object.rotation, .1, {x: Math.PI * .03, ease: Expo.easeOut});
            object.material.color.set('rgb(255, 0, 0)');
            MIDI.setVolume(0, 127);
            MIDI.noteOn(0, note + octave * 12 + 24, 127);
            if (!userInput && tutorial) tutorial_data.push(note);
        }
    }

    function nodeUp(object, note, userInput = true) {
        if (object.userData.PRESSED) {
            this.tl.to(object.rotation, .1, {x: 0, ease: Expo.easeOut});
            setTimeout(() => {
                if (userInput && tutorial) {
                    if (tutorial_data.length > 0) {
                        var tutorial_true = false;
                        if (tutorial_data[0] == note) {
                            tutorial_data.splice(0, 1);
                            tutorial_true = true;
                        }
                        if (tutorial_true || !tutorial_data.includes(note)) {
                            fix_object_color(object);
                        }
                    }
                    if (tutorial_data.length == 0) MIDI.Player.resume();
                } else if (!userInput && tutorial) {
                    MIDI.Player.pause();
                } else {
                    fix_object_color(object);
                }
                MIDI.noteOff(0, note + octave * 12 + 24, 0.08);
                object.userData.PRESSED = false;
            }, 100);
        }
    }

    function moveSoundNode(object) {
        var note = 0;
        if (object.userData.NODECOLOR == "White") {
            var arr = [0, 2, 4, 5, 7, 9, 11];
            note = Math.floor((object.userData.NODEID) / 7) * 12 + arr[(object.userData.NODEID) % 7];
        } else if (object.userData.NODECOLOR == "Black") {
            var arr = [1, 3, 6, 8, 10];
            note = Math.floor((object.userData.NODEID) / 5) * 12 + arr[(object.userData.NODEID) % 5];
        }
        nodeDown(object, note);
        nodeUp(object, note);
    }

    function clear_state() {
        for (var i = 0; i < nodeGroupBlack.children.length; i++) {
            nodeGroupBlack.children[i].material.color.set('rgb(0, 0, 0)');
        }
        for (var i = 0; i < nodeGroupWhite.children.length; i++) {
            nodeGroupWhite.children[i].material.color.set('rgb(255, 255, 255)');
        }
        tutorial_data.splice(0, tutorial_data.length);
    }


    function Tutorial_State_Change() {
        if (tutorial) {
            tutorial = false;
            clear_state();
            MIDI.Player.resume();
        } else {
            tutorial = true;
        }
        return tutorial;
    }

    function touchedNode(x, y) {
        var location = new THREE.Vector2();
        location.x = (x / window.innerWidth) * 2 - 1;
        location.y = -(y / window.innerHeight) * 2 + 1;
        raycaster.setFromCamera(location, camera);
        var intersects = raycaster.intersectObjects(scene.children, true);
        if (intersects.length >= 1 && intersects[0].object.userData.NAME == "Node") moveSoundNode(intersects[0].object);
    }

    function note_key(note) {
        var arr = [0, -5, 1, -4, 2, 3, -3, 4, -2, 5, -1, 6];
        var num = arr[note % 12];
        var object;
        if (num >= 0) object = nodeGroupWhite.children[Math.floor(note / 12) * 7 + num];
        else object = nodeGroupBlack.children[Math.floor(note / 12) * 5 + num + 5];
        return object;
    }

    function keyboard_condition(keyCode, condition) {
        var note = -1;
        //-----------------------------------
        if (keyCode == 90) note = 0; // C 0
        if (keyCode == 83) note = 1; // C#0
        if (keyCode == 88) note = 2; // D 0
        if (keyCode == 68) note = 3; // D#0
        if (keyCode == 67) note = 4; // E 0
        if (keyCode == 86) note = 5; // F 0
        if (keyCode == 71) note = 6; // F#0
        if (keyCode == 66) note = 7; // G 0
        if (keyCode == 72) note = 8; // G#0
        if (keyCode == 78) note = 9; // A 0
        if (keyCode == 74) note = 10; // A#0
        if (keyCode == 77) note = 11; // B 0

        //-----------------------------------
        if (keyCode == 81 || keyCode == 188) note = 12; // C 1
        if (keyCode == 50) note = 13; // C#1
        if (keyCode == 87) note = 14; // D 1
        if (keyCode == 51) note = 15; // D#1
        if (keyCode == 69) note = 16; // E 1
        if (keyCode == 82) note = 17; // F 1
        if (keyCode == 53) note = 18; // F#1
        if (keyCode == 84) note = 19; // G 1
        if (keyCode == 54) note = 20; // G#1
        if (keyCode == 89) note = 21; // A 1
        if (keyCode == 55) note = 22; // A#1
        if (keyCode == 85) note = 23; // B 1
        //-----------------------------------
        if (keyCode == 73) note = 24; // C 2
        if (keyCode == 57) note = 25; // C#2
        if (keyCode == 79) note = 26; // D 2
        if (keyCode == 48) note = 27; // D#2
        if (keyCode == 80) note = 28; // E 2
        if (keyCode == 219) note = 29; // F 2
        if (keyCode == 187) note = 30; // F#2
        if (keyCode == 221) note = 31; // G 2
        //-----------------------------------

        if (condition) {
            if (keyCode == 220) {
                octave_loc = 0;
            } else if (keyCode == 16) {
                octave_loc = 1;
            } else if (keyCode == 17) {
                octave_loc = 2;
            } else if (keyCode == 20) {
                octave_loc = 3;
            } else if (keyCode == 13) {
                octave_loc = 4;
            } else if (keyCode == 49) {
                Tutorial_State_Change();
            }
        }
        if (note != -1) {
            note += octave_loc * 12;
            var object = note_key(note);
            if (condition) {
                nodeDown(object, note);
            } else {
                nodeUp(object, note);
            }
        }
    }

    //multi touch

    function onTouch(event) {
        //event.preventDefault();
        for (var j = 0; j < event.touches.length; j++) {
            touchedNode(event.touches[j].pageX, event.touches[j].pageY);
        }

        // if (getAudioContext().state !== 'running') {
        //     getAudioContext().resume();
        // }
    }

    function onMouseDrag(event) {
        if (event.buttons == 1 || event.buttons == 3) {
            touchedNode(event.clientX, event.clientY);
        }
    }


    function onKeyDown(event) {
        event.preventDefault();
        keyboard_condition(event.keyCode, true);
    }

    function oneKeyUp(event) {
        event.preventDefault();
        keyboard_condition(event.keyCode, false);
    }

    function cameraMovement() {
        degree += 1;
        let deg = degree * Math.PI / 180;
        let x = 40 * Math.cos(deg) + pivot.x;
        let z = -40 * Math.sin(deg) + pivot.z;
        camera.position.x = x;
        camera.position.z = z;
        camera.rotation.y = deg + Math.PI / 2;
    }


    // render

    var flag = false;
    var render = function () {
        // if (Spin) {
        //     // cameraMovement();
        // } else {
        //     if (degree % 360 != 270) cameraMovement();
        //     else {
        //         if (camera.position.z > 25) {
        //             camera.position.z -= 0.2;
        //         } else {
        //             if (!flag) {
        //                 // document.querySelector('.sidebar').classList.toggle('active');
        //                 flag = true;
        //             }
        //         }
        //     }
        // }
        requestAnimationFrame(render);
        renderer.render(scene, camera);
    }

</script>

<!-- particle -->
<script src="{{asset('piano/js/particle/Vector.js')}}"></script>
<script src="{{asset('piano/js/particle/Particle.js')}}"></script>
<script src="{{asset('piano/js/particle/ParticleMain.js')}}"></script>

{{--<script src="{{asset('piano/js/main.js')}}"></script>--}}

<script>
    // controls

    document.querySelector('#start-button').addEventListener('click', () => {
        document.querySelector('.start-dialog').style.display = 'none';
        Spin = false;
        // camera.position.x = 0;
        // camera.position.z = 25;
        // camera.position.y = 15;
        // camera.rotation.y = 0;

        var url_string = window.location.href;
        var url = new URL(url_string);
        var c = url.searchParams.get("m");
        console.log(c);
        // console.log("hello world");

        let songFile = c;
        MIDI.Player.loadFile(`piano/midi/${songFile}`, MIDI.Player.start);

        // document.querySelector('.start-dialog').style.display = 'none';
        // document.querySelector('#pause-button').innerHTML = 'Pause';
        isPause = true;
    });

    let isPause = true;
    document.querySelector('#play-button').addEventListener('click', () => {
        let songFile = songs.value;
        clear_state();
        MIDI.Player.loadFile(`piano/midi/${songFile}`, MIDI.Player.start);
        document.querySelector('.start-dialog').style.display = 'none';
        document.querySelector('#pause-button').innerHTML = 'Pause';
        isPause = true;
    });


    document.querySelector('#pause-button').addEventListener('click', (e) => {
        if (isPause) {
            e.target.innerHTML = 'Resume';
            MIDI.Player.pause();
            isPause = false;
        } else {
            e.target.innerHTML = 'Pause';
            MIDI.Player.resume();
            isPause = true;
        }

    });

    document.querySelector('#stop-button').addEventListener('click', () => {
        clear_state();
        document.querySelector('#pause-button').innerHTML = 'Pause';
        isPause = true;
        MIDI.Player.stop();
    });

    document.querySelector('.toggle-button').addEventListener('click', () => {
        document.querySelector('.sidebar').classList.toggle('active');
    });

    document.querySelector('#tutorial-button').addEventListener('click', (e) => {
        let isTutorial = Tutorial_State_Change();

        if (isTutorial) {
            e.target.innerHTML = 'Default Mode';
        } else {
            e.target.innerHTML = 'Tutorial Mode';
        }
    });


    //interaction control
    window.addEventListener('touchstart', onTouch);
    window.addEventListener('touchmove', onTouch);
    window.addEventListener('mousedown', onMouseDrag);
    window.addEventListener('mousemove', onMouseDrag);
    window.addEventListener('keydown', onKeyDown);
    window.addEventListener('keyup', oneKeyUp);

    // load
    window.onload = function () {
        clear_state();
        MIDI.loadPlugin(function () {

            let songs = [
                {
                    text: 'Backstreet Boys - I want it that way',
                    value: 'Backstreet_Boys_i-want-it-that-way.mid'
                },
                {
                    text: 'A Whole New World - Aladdin',
                    value: 'A-Whole-New-World-(Theme-From-Aladdin).mid'
                },
                {
                    text: 'Coldplay - Viva La Vida',
                    value: 'coldplay_viva-la-vida.mid'
                },
                {
                    text: 'Mario Overworold Song Theme',
                    value: 'mario_-_overworld_theme.mid'
                },
                {
                    text: 'Beethoven - For Elise',
                    value: 'for_elise_by_beethoven.mid'
                },
                {
                    text: 'Indonesia Raya',
                    value: '41194_Indonesia-Raya.mid'
                }
            ];
            songs.forEach(song => {
                let option = document.createElement('option');
                option.value = song.value;
                option.innerHTML = song.text;
                // alert(song.value);
                console.log(song.value);
                document.querySelector('#songs').appendChild(option);
            });

            MIDI.Player.addListener(function (data) {
                var pianoKey = data.note + octave * 12 - MIDI.pianoKeyOffset - 3;
                if (pianoKey != -1) {
                    var object = note_key(pianoKey);
                    if (data.message === 144) {
                        nodeDown(object, pianoKey, false);
                    } else {
                        nodeUp(object, pianoKey, false);
                    }
                }
            });
        });
        render();


        // alert("test");
        // var url_string = window.location.href;
        // var url = new URL(url_string);
        // var c = url.searchParams.get("m");
        // console.log(c);
        // // console.log("hello world");
        //
        // let songFile = c;
        // MIDI.Player.loadFile(`piano/midi/${songFile}`, MIDI.Player.start);
        //
        // // document.querySelector('.start-dialog').style.display = 'none';
        // // document.querySelector('#pause-button').innerHTML = 'Pause';
        // isPause = true;
    }

</script>
