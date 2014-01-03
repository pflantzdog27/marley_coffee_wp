    <footer id="footer" class="clearfix hidden-xs">
        <div class="container">
            <div class="row">
                <div id="footer-main-wrap" class="col-sm-9">
                    <nav id="footer-nav">
                        <ul class="col-sm-3">
                            <h4>Coffee</h4>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                        </ul>
                        <ul class="col-sm-3">
                            <h4>About</h4>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                        </ul>
                        <ul class="col-sm-3">
                            <h4>Learn</h4>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                        </ul>
                        <ul class="col-sm-3">
                            <h4>Investor Relations</h4>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                            <li><a href="#">Lorem Ipsum</a></li>
                        </ul>
                    </nav>
                </div>
                <aside id="coffee-cup" class="col-sm-3 hidden-xs">
                    <img src="<?php bloginfo('template_url')?>/images/coffee-cup.svg" alt="Marley Coffee Cup">
                </aside>
            </div>
            <footer class="copyright col-sm-9">
                <small>Copyright 2013 Marley Coffee/Jammin Java Corp. All rights reserved.</small>
            </footer>
        </div>
    </footer>
</div><!-- close wrapper -->

    <!-- modals-->
    <div class="modal fade" id="affiliate-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Upon submitting your email address you will prompted to enter a password.</h4>
                </div>
                <div class="modal-body">
                    <form class="form-inline" role="form" action="https://docs.google.com/a/ogilvy.com/forms/d/1pLJJRDxpz8M-28LrSM8DC_AA_oalMm4IM3WIZkhUEXM/formResponse" method="POST" id="email-form" target="hidden_iframe">
                        <div class="form-group col-xs-12">
                            <label class="sr-only" for="entry_2140574999">Email address</label>
                            <input type="email" class="form-control ss-q-short valid" name="entry.2140574999" value="" id="entry_2140574999" placeholder="Enter email" required>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="submit" value="Submit" class="submit btn btn-primary btn-block">
                            <input type="hidden" name="draftResponse" value="[]">
                            <input type="hidden" name="pageHistory" value="0">
                        </div>
                    </form>
                </div>
                <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;">
                </iframe>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

	<?php wp_footer(); ?>
</body>
</html>