/*global
  $:true
  local_vars: true 
*/

function jobPaginationQuery(pageNumber = 2) {
	let data = {};

	data._embed = true;

	data.per_page = $('.blog-section').data('per-page');

	data.page = pageNumber;

	//console.log(data);

	$.ajax({
		url: local_vars.site_url + '/wp-json/wp/v2/posts',
		data
	})
		.done(function (response, status, jqxhr) {
			let totalPages = jqxhr.getResponseHeader('x-wp-totalpages');

			if (totalPages == pageNumber) {
				// hide load more
				$('.load-more-posts-container').hide();
			}

			response.map(item => {
				let card = buildJobCard(item);

				// attach to container
				$('.posts-container').append(card);
			});

			$('.blog-section').removeClass('loading');
		})
		.fail(function (err) {
			console.log('request fail ', err);
		});
}

function buildJobCard(value) {

	let img = local_vars.backup_img;
	if (value.thumbnail) {
		img = value.thumbnail;
	}

	var $all_terms = null;
	if (value.term_items) {
		$all_terms = '<div class="categories">';
		$.each(value.term_items, function () {
			let term_item = $(this);
			term_item = term_item[0];
			$all_terms += '<a href="' + term_item.term_link + '"><i class="fa fa-tag"></i> ' + term_item.term_name + '</a>';
		});
		// close
		$all_terms += '</div>';
	}


	let output = `
		<div class="col-md-4">
			<div class="card-blog">	

				${$all_terms}	

				<a class="post-link" href="${value.link}">
					<div class="thumbnail">
						

						<div class="bg" style="background-image: url(${img})"></div>

						<div class="date"><i class="fa fa-calendar"></i> ${value.date_formated}</div>
					</div>
					<div class="post-detail">
						<p class="title">${value.title_trimmed}</p>
					</div>
				</a>
			</div>
		</div>`;


	output = $.parseHTML(output);
	return output;
}


$('#load-more-posts').click(function () {
	$('.blog-section').addClass('loading');

	//let filterValues = getJobFilterValues();
	let pageNumber = $('#load-more-posts').data('page');
	jobPaginationQuery(pageNumber);

	// inc page number
	let newPageNum = parseInt(pageNumber) + 1;
	// set
	$('#load-more-posts').data('page', newPageNum);
});
