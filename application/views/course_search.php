<?php $this->load->view('layouts/admin/head'); ?>
<style type="text/css">
    .text-muted {
    color: #bcbdcb!important;
}
</style>
        <?php $this->load->view('layouts/admin/top'); ?>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <?php $this->load->view('layouts/admin/filters'); ?>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row" id='response_data'>
                            
                            
                        </div>

                        <!-- <nav class="custom-pagination">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item">
                                    <a class="page-link bg-primary text-light border-primary" href="#" aria-label="Previous">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    <div class="ripple-container"></div></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="page-link" href="#" tabindex="-1">1</a>
                                </li>
                                <li class="list-inline-item active"><a class="page-link" href="#">2</a></li>
                                <li class="list-inline-item"><a class="page-link" href="#">3</a></li>
                                <li class="list-inline-item">
                                    <a class="page-link bg-primary text-light border-primary" href="#" aria-label="Next">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->

                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php $this->load->view('layouts/admin/footer'); ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <?php $this->load->view('layouts/admin/color'); ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

<!-- Training Modal -->
<div class="modal fade" id="traininggModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Training</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="trainingForm">
            <input type="hidden" name="courseId" id="courseId">
            <input type="hidden" name="Comp_cd" id="Comp_cd">
            <div class="form-group">
                <label>Group Size</label>
                <input type="number" name="group_size" class="form-control" required="">
            </div>

            <div class="form-group" id="site_address">
                <label>Training Location Address</label>
                <input type="text" name="off_site_add" class="form-control" id="off_site_add">
            </div>

            <div class="form-group">
                <label>Training Date</label>
                <input type="date" name="training_date" class="form-control" required="">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- customer model -->
<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-white">
            Currently being updated.
        </p>
      </div>
      
    </div>
  </div>
</div>


<?php $this->load->view('layouts/admin/script'); ?>

<script type="text/javascript">
    get_data();
    function get_data(){
        var level = [];
        var type = [];
        var lang = [];
        var vendor = [];
        $("input:checkbox[name=levels]:checked").each(function(){
            level.push($(this).val());
        });

        $("input:checkbox[name=types]:checked").each(function(){
            type.push($(this).val());
        });

        $("input:checkbox[name=langs]:checked").each(function(){
            lang.push($(this).val());
        });

        $("input:checkbox[name=vendor]:checked").each(function(){
            vendor.push($(this).val());
        });

        var topic = $('#topic').val();

        if(topic == ''){
            $('#side-menu').hide();
        }else{
            $('#side-menu').show();
        }
        // var vendor = $('#vendor').val();
        var duration = $('#myRange').val();
        
        $.ajax({
                type: "POST",
                url: "<?php echo site_url()?>/course/load_data",
                data: {'level':level,type:type,lang:lang,topic:topic,vendor:vendor,duration:duration},
                    success: function(v) {
                        $('#response_data').html(v);
                }
            });
    }

function truncateWords(sentence, amount, tail) {
  const words = sentence.split(' ');

  if (amount >= words.length) {
    return sentence;
  }

  const truncated = words.slice(0, amount);
  return `${truncated.join(' ')}${tail}`;
}

// https://codepen.io/bmarshall511/pen/xxZBQPz
// console.log(truncateWords(sentence, 20, '...'));

function trainingModal(cid,tt_id,Comp_cd){
    // console.log(cid,tt_id);
    if(tt_id == 3){
        $('#site_address').hide();
        $('#off_site_add').prop('required', false);
    }else{
        $('#site_address').show();
        $('#off_site_add').prop('required', true);
    }

    $('#courseId').val(cid);
    $('#Comp_cd').val(Comp_cd);

    $('#traininggModal').modal('show');
}

$('#trainingForm').on('submit', function(e){
    e.preventDefault();

    var data = $(this).serializeArray();
    $.post('<?= base_url('training/add_training') ?>',data,function(res){
        if(res.status == 'success'){
          alert(res.response);
          // location.reload();
          window.location.href = "<?php echo base_url('dashboard'); ?>";
        }else{
          alert(res.response);
        }
    });
})

</script>