(function($) {

    // Remove Tab
    function mm_move_tab(elem, data) {
        var $this = $(elem),
            group_id = $this.data('group-id'),
            id_tab = $this.data('tab-id'),
            $mm_tabs = $this.closest('.mm-tabs'),
            $tab__body = $('.mm-tabs__content--'+id_tab+'.mm-tabs-group--'+group_id, $mm_tabs),
            $slave_tab__head = $('.mm-tabs__tab--'+(id_tab*1 + data*1)+'.mm-tabs-group--'+group_id, $mm_tabs),
            $slave_tab__body = $('.mm-tabs__content--'+(id_tab*1 + data*1)+'.mm-tabs-group--'+group_id, $mm_tabs);

        if ($slave_tab__body.length) {
            mm_rename_tab($mm_tabs, group_id, 0, id_tab*1, true);
            mm_rename_tab($mm_tabs, group_id, id_tab, id_tab*1 + data*1, true);
            mm_rename_tab($mm_tabs, group_id, id_tab*1 + data*1, 0, true);

            $slave_tab__head.trigger('click');

            if (data > 0) {
                $tab__body.insertAfter($tab__body.next());
            } else {
                $slave_tab__body.insertAfter($slave_tab__body.next());
            }
        }
    }

    window.mm_move_tab = mm_move_tab;

})($ || window.jQuery);