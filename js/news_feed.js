$(document).ready(function() {
    $('.ir_news').feeds({
        feeds : {
            ir_news : 'http://www.jamminjavacoffee.com/index.php/corporate/current-news?format=feed&type=rss'
        },
        max: 10,
        ssl: 'auto',
        xml: true,
        onComplete: function (entries) {
            // cut gsablogs text
            $('.feeds-source-ir_news .feed-entry-content').each(function() {
                var text = $(this).text();
                var cutText = text.substring(0, text.indexOf(" ", 200));
                var newText = cutText + ' ...';
                $(this).text(newText);
            });
        },
        preprocess: function ( feed ) {
            var theContent = this.content;
            if(theContent.indexOf('src="http:') >= 0) {
                var replaced = theContent.replace('src="http:','src="https:');
                this.contentSnippet = replaced;
            }

            //Long TITLE
            this.feedTitle = this.title

            // title character limit
            var feedTitle = this.title;
            if(feedTitle.length > 25) {
                var cutTitle = feedTitle.substring(0, feedTitle.indexOf(" ", 25));
                var lastCut = cutTitle + ' ...';
                this.title = lastCut;
            } else {
                this.title = feedTitle;
            }
        },
        loadingTemplate: '<h3>News Feed is in the process of being loaded...</h3>',
        entryTemplate: function(entry) {
            var template = '';
            if (entry.source == 'ir_news') {
                template =  '<div class="feeds-entry feeds-source-<!=source!>">' +
                    '<h2><a href="<!=link!>"<!=title!></a></h2>' +
                    '<div class="feed-entry-content"><!=contentSnippet!></div>' +
                    '</div>'
            }
            return this.tmpl(template, entry);
        }
    });
});
