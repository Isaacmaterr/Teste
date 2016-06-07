<?php global $smof_data; ?>
		<?php cshero_footer(); ?>
		</div>
        <!--Meny-->
        <?php
        if($smof_data['enable_hidden_sidebar'] && !cshero_isMobile()){
            ?>

            <div class="control" style="position:fixed;top:100px;left:0;z-index:99999999;">
            </div>
            <div class="meny-sidebar">
                <div class="meny-sidebar-wrapper">
                    <div class="control">
                        <span class="cs_close right"><i class=""></i></span>
                    </div>
                    <div class="primary-hidden-sidebar"><?php dynamic_sidebar('cshero-widget-hidden-menu');?></div>
                </div>
            </div>
            <?php
        }
        ?>
		<?php if($smof_data['footer_to_top'] == '1'): ?>
		<a id="back_to_top" class="back_to_top">
			<span class="go_up">
				<i style="" class="fa fa-arrow-up"></i>
			</span></a>
		<?php endif; ?>
		<?php wp_footer(); ?>
	</body>
</html>