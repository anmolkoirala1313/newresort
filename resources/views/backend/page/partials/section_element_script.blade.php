<script>
    $(document).on('click','#add_row', function (e){
        e.preventDefault();
        let count =  $('#timeline-table tbody tr').length;
        count ++;
        let detail = @json(view($view_path.'partials.timeline_details')->render());
        $('#timeline-table tbody tr:last').after(detail);
         loadCloneEditor();
    });

    $(document).on('click','.remove_row', function (e){
        let count =  $('#timeline-table tbody tr').length;
        count --;
        if (count < 1){
            Swal.fire({
                title: "Action prohibited",
                text: "Cannot remove the last timeline field",
                icon: "info",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
            return false;
        }
        $(this).closest('tr').remove();
    });

    function loadCloneEditor() {
        let selector = $('.ck-editor');
        if (selector.length > 0) {
            $(selector).each(function () {
                if (CKEDITOR.instances[$(this).prop('id')]) {
                    CKEDITOR.instances[$(this).prop('id')].destroy();
                }
                CKEDITOR.replace($(this).prop('id'), {
                    allowedContent: true
                });
            });
        }
    }

</script>
<script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script>

    $(document).on('click','#add_flash', function (e){
        e.preventDefault();
        let count =  $('#flash-table > tbody > tr').length;
        count ++;

        if (count > 8){
            Swal.fire({
                title: "Limit Reached",
                text: "Cannot add more than 9 flash card fields",
                icon: "info",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
            return false;
        }

        let detail = @json(view($view_path.'partials.flash_detail')->render());
        $('#flash-table tbody tr:last').after(detail);

    });

    $(document).on('click','.remove_flash', function (e){
        let count =  $('#flash-table > tbody > tr').length;
        count --;
        if (count < 1){
            Swal.fire({
                title: "Action prohibited",
                text: "Cannot remove the last flash card field",
                icon: "info",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
            return false;
        }
        $(this).closest('tr').remove();
    });

</script>
