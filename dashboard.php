<style>
    #search{
        border: 1px solid black;
    }
    #listBox{
        padding: 0 20px 0 20px;
        border: 1px solid black;
        border-radius: 5px;
        max-height: 200px;
        overflow: scroll;
        overflow-x: hidden;
        display: none;
        cursor: pointer;
    }
</style>
<div class="container-fluid">
    <label for="">Search User</label>
    <input type="text" id="search" class="form-control" placeholder="Search...">
    <ul id="listBox">
        
    </ul>
</div>

<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
            var search = $(this).val();
            if(search!=""){
                $.ajax({
                    url:"<?php echo base_url('dashboard/get_user_data')?>",
                    method:"GET",
                    data:{search:search},
                    dataType:"JSON",
                    success:function(res){
                        $('#listBox').empty();
                        if(res){
                            var list = '';
                            $.each(res,function(index,value){
                                list +='<li class="list">'+value.name+'</li>';
                            });
                            $('#listBox').append(list);

                        }
                    }
                })
                $('#listBox').show();
            }else{
                $('#listBox').hide();
            }
        });


        $(document).on('click','.list',function(){
            name = $(this).html();
            $('#search').val(name);
        })
    })
</script>
