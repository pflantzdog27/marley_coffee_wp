<?php if( get_field( "shareable" ) ): ?>
    <span class="share-button"></span>
    <aside class="share-options">
        <ul>
            <li id="fb-share">
                <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer' +
                                             '.php?u='+encodeURIComponent('http://marleycoffee.com'),
                                             'facebook-share-dialog','width=626,height=436');return false;"></a>
            </li>
            <li id="twitter-share">
                <a href="http://twitter
                                            .com/intent/tweet?url=&text=<?php the_title()?>&via=MarleyCoffee"
                   target="_blank"></a>
            </li>
            <li id="mail-share">
                <a href="mailto:?subject=Marley Coffee&body=Body copy here"></a>
            </li>
            <li id="pin-share">
                <a href="http://www.pinterest.com/pin/create/button/
                                                ?url=http%3A%2F%2Fwww.marleycoffee.com
                                                &media=<?php the_field('image_upload_select');?>
                                                &description=<?php the_title()?>"
                   data-pin-do="buttonPin"
                   data-pin-config="above">
                </a>
            </li>
            <li id="close-share">
                <a href="#"></a>
            </li>
        </ul>
    </aside>
<?php endif;?>