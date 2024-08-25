
<input type="checkbox" value="{{ $row->id  }}" name="selected_customer" id="selected_customer" />

<script type="text/javascript">

    $(document).ready(function() {
        var selected = [];
       // var arr =[];
            $("#button").click(function(){
                $.each($("input[name='selected_customer']:checked"), function(){
                    selected.push($(this).val());

                });
             //var arr = selected;
             $("#test").val(selected)
                return selected;
            });

        //    $("input[type='sendToNew']:checked").val([1,2,3,4]);

        //     console.log(document.queryelector("radio"));
        // // $("#customers").val(selected);

        $('#allSelectedCustomer').click(function(){

             $(this).val(selected);

        });

        });

    </script>
