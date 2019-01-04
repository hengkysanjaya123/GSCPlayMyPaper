$(() => {
    let url = $("meta[name='home_url']").attr('content');
    $('#go').on('click', () => {
        if(!$("#file").val()){
            alert("Please select the image file first!!");
        }
        else{
            let file = $("#file")[0].files[0];

            let data = new FormData();
            data.append('file', file);

            console.log(url + '/uploadFile');
            $.ajax({
                type: 'post',
                dataType: 'json',
                url: url + '/uploadFile',
                data: data,
                processData: false,
                contentType: false,
                beforeSend: () => {
                    $('.modal').addClass('active');
                },
                success: (res) => {
                    location.href = url + '/' + res.name
                }
            })
        }
    });
})