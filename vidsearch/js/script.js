//searchbar Handler
$(function(){

	var searchField = $('#query');
	var icon = $('#search-btn');

	// focus event Handler
	$(searchField).on('focus',function() {
		// body...
		$(this).animate({
			width:'100%'
		},400);
		$(icon).animate({
			right: '10px'
		},400)
	});
	//blur event handler
	$(searchField).on('blur',function() {
		// body...
		if(searchField.val() ==''){
			$(searchField).animate({
				width:'45%'
			},400,function(){});
			$(icon).animate({
				width: '360px'
			},400,function(){});
		}

	});
	$('#search-form').submit(function(e){
		e.preventDefault();
	});
})



function search() {
	// body...
	//clear Results
	$('#results').html('');
	$('#buttons').html('');

	//Get Form Input
	q = $('#query').val();

	//run get request on API
	$.get(
		"https://www.googleapis.com/youtube/v3/search",{
			part: 'snippet,id',
			q:q,
			type:'video',
			key: 'AIzaSyCVdxfAgj8zFE2jL3yRD3Vbh8d_bGeAQtw'	},
			function (data){
				var nextPageToken = data.nextPageToken;
				var prevPageToken= data.prevPageToken;
				console.log(data);
				$.each(data.items, function(i, item){
					//get output
					var output = getOutput(item);

					//display results
					

                    $('#results').append(output);                 
          });
				var buttons= getButtons(prevPageToken, nextPageToken);

				//display buttons                 

				$('#buttons').append(buttons);
				
			}

		);
}
function nextPage(){


	var token =$('#next-button').data('token');
	var q =$('#next-button').data('query')

	$('#results').html('');
	$('#buttons').html('');

	//Get Form Input
	q = $('#query').val();

	//run get request on API
	$.get(
		"https://www.googleapis.com/youtube/v3/search",{
			part: 'snippet,id',
			q:q,
			pageToken: token,
			type:'video',
			key: 'AIzaSyCVdxfAgj8zFE2jL3yRD3Vbh8d_bGeAQtw'	},
			function (data){
				var nextPageToken = data.nextPageToken;
				var prevPageToken= data.prevPageToken;
				console.log(data);
				$.each(data.items, function(i, item){
					//get output
					var output = getOutput(item);

					//display results
					

                    $('#results').append(output);                 
          });
				var buttons= getButtons(prevPageToken, nextPageToken);

				//display buttons                 

				$('#buttons').append(buttons);
				
			}

		);
}
function prevPage(){


	var token =$('#prev-button').data('token');
	var q =$('#prev-button').data('query')

	$('#results').html('');
	$('#buttons').html('');

	//Get Form Input
	q = $('#query').val();

	//run get request on API
	$.get(
		"https://www.googleapis.com/youtube/v3/search",{
			part: 'snippet,id',
			q:q,
			pageToken: token,
			type:'video',
			key: 'AIzaSyCVdxfAgj8zFE2jL3yRD3Vbh8d_bGeAQtw'	},
			function (data){
				var nextPageToken = data.nextPageToken;
				var prevPageToken= data.prevPageToken;
				console.log(data);
				$.each(data.items, function(i, item){
					//get output
					var output = getOutput(item);

					//display results
					

                    $('#results').append(output);                 
          });
				var buttons= getButtons(prevPageToken, nextPageToken);

				//display buttons                 

				$('#buttons').append(buttons);
				
			}

		);
}
// Build output

function getOutput(item){
	var videoId = item.id.videoId;
	var title = item.snippet.title;
	var description = item.snippet.description;
	var thumb = item.snippet.thumbnails.high.url;
	var channelTitle = item.snippet.channelTitle;
	var videoDate = item.snippet.publishedAt;


	//build output string

	var output= '<li>'+
	'<div class="list-left">'+
	'<img src="'+thumb+'"></div>'+
	'<div class="list-right">'+
	'<h3 ><a href="http://www.youtube.com/embed/'+videoId+'" data-fancybox class="fancybox fancybox.iframe">'+title+'</a></h3>'+
	'<small>By <span class="cTitle">'+channelTitle+'</span> on '+videoDate+'</small>'+
	'<p>'+description+'</p>'+
	'</div>'+ 
	'</li>'+
	'<div class="clearfix"></div>'+
	'';
	return output;


}
function getButtons(prevPageToken,nextPageToken){
	if(!prevPageToken){
		var btnoutput =' <div class="button-container">'+'<button id="next-button" class="paging-button" data-token="'+ nextPageToken +'"data-query="'+q+'"'+
		'onclick="nextPage();">Next Page</button>'+'</div>';
	}else
	{
		var btnoutput =' <div class="button-container">'+
		'<button id="prev-button" class="paging-button" data-token="'+prevPageToken+'"data-query="'+q+'"'+
		'onclick="prevPage();">Prevkous Page</button>'+
		'<button id="next-button" class="paging-button" data-token="'+nextPageToken+'"data-query="'+q+'"'+
		'onclick="nextPage();">Next Page</button>'+'</div>';
	}
	return btnoutput;
}