function instagramFeed(containerSelector, options, callback) {
	this.callback = callback || null;
	this.containerSelector = containerSelector;
	this.options = options || {
		tag: 'instagram',
		user_id: false,
		count: '5'
	};
	this.base_url = 'https://www.instagram.com/explore/tags/' + this.options.tag + '/?__a=1';
	this.url = 'https://www.instagram.com/explore/tags/' + this.options.tag + '/?__a=1';
	this.posts = [];
}

instagramFeed.prototype.init = function() {
	var $_this = this;
	var mediaData = this.getJsonData();
	mediaData.then(function(obj) {
			var media = obj.graphql.hashtag.edge_hashtag_to_media,
				edges = media.edges,
				totals = media.count;
			if ($_this.options.user_id) {
				edges = edges.filter(function(v) {
					return v.node.owner.id == $_this.options.user_id;
				});
			}
			if (edges && edges.length) {
				for (var k in edges) {
					$_this.posts.push(edges[k]);
				}
			}
			if ($_this.posts.length < $_this.options.count && media.page_info.has_next_page) {
				$_this.url = $_this.base_url + '&amp;max_id=' + media.page_info.end_cursor;
				$_this.init();
			} else {
				$_this.posts = $_this.posts.slice(0, $_this.options.count);
				$_this.handleData();
			}
		},
		function(error) {
			console.log(error);
		});
}

instagramFeed.prototype.createElementFromHTMLString = function(htmlString) {
	var div = document.createElement('div');
	div.innerHTML = htmlString.trim();
	return div.firstChild;
}

instagramFeed.prototype.createItemHtml = function(itemdata, itemindex) {
	var html = '<div class="instagram-feed-item item-' + itemindex + '">' +
		'  <a class="d-block" data-fancybox href="' + itemdata.thumbnail_src + '" data-src="' + itemdata.thumbnail_src + '" data-id="' + itemdata.id + '" data-like="' + itemdata.edge_liked_by.count + '">' +
		'     <figure class="lazyload mb-0" data-background-image="' + itemdata.thumbnail_src + '"></figure>' +
		'  </a>' +
		'</div>';
	return this.createElementFromHTMLString(html);
}

instagramFeed.prototype.handleData = function() {
	var posts = this.posts;
	var $_this = this;
	var container = document.querySelector($_this.containerSelector);
	container.innerHTML = '';
	posts.forEach(function(elem, index) {
		container.appendChild($_this.createItemHtml(elem.node, index + 2));
	});
	// for( var i=10; i<=12; i++ ){
	//    var emptyitem = document.createElement('div'),
	//    figure = document.createElement('figure');
	//
	//    emptyitem.classList.add('instagram-feed-item');
	//    emptyitem.classList.add('item-' + i);
	//    figure.classList.add('mb-0');
	//    emptyitem.appendChild(figure);
	//    container.appendChild(emptyitem);
	// }
	if ($_this.callback) {
		$_this.callback();
	}
	return;
}

instagramFeed.prototype.getJsonData = function() {
	var $_this = this;
	return new Promise(function(resolve, reject) {
		var httpRequest = new XMLHttpRequest();
		httpRequest.open('GET', $_this.url, true);
		httpRequest.onreadystatechange = function() {
			if (httpRequest.readyState == 4) {
				if (httpRequest.status == 200) {
					var obj = JSON.parse(httpRequest.responseText);
					// var media = obj.graphql.hashtag.edge_hashtag_to_media.edges;
					// if( $_this.options.user_id ){
					//    media = media.filter(function(v){
					//       return v.node.owner.id == $_this.options.user_id;
					//    });
					// }
					resolve(obj);
				} else {
					reject(new Error(httpReq.statusText));
				}
			}
		};
		httpRequest.send(null);
	});
}