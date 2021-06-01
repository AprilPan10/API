function sendRequest(){
    var userInput = document.getElementById("input").value;
    var giphyApiKey = '4U151ZOVXWgyiJcqdKYX5fyuOwrPU6P2';
    var giphyApiURL = `https://api.giphy.com/v1/gifs/search?q=${userInput}&rating=g&api_key=${giphyApiKey}&limit=20`;
    fetch(giphyApiURL).then(function (data){
        return data.json()
    })
        .then(function(jason){
            var i;
            for (i = 0; i < 20; i++) {
                var imgPath = jason.data[i].images.fixed_height.url;
                console.log(imgPath);
                var img = document.createElement("img");
                img.setAttribute("src", imgPath);
                document.getElementById("image").appendChild(img);
                $("img").on('click', function() {
                    $("p").html($(this).attr('src'));
                });
                $( function() {
                    $( "#image" ).selectable();
                } );
            }
        })
    }




