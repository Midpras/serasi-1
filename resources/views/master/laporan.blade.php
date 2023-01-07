@extends('layouts.main')

@section('container')


<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>{{$pegawai->name}}</h4>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card-box m-b-50">
                            <div id="calendarevent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <!-- #/ container -->
</div>
    <!-- #/ content body -->
    <!-- footer -->
    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; <a href="https://ule.merkulov.design">Ule</a> 2019, by <a href="https://1.envato.market/tf-merkulove" target="_blank">merkulove</a></p>
        </div>
    </div>
    <!-- #/ footer -->
</div>
<!-- Common JS -->
<script src="{{asset('assets/plugins/common/common.min.js')}}"></script>
<script src="{{asset('assets/js/custom+mini-nav.js') }}"></script>
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendarevent');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap5',
        dateClick: function(info) {
            var date = info.dateStr;
            var url = '{{route("laporan.create")}}'
            window.location.href = url + "/" + date
            // $.ajax({
            //     type: 'GET',
            //     data:{"tanggal":date},
            //     url : '{{route("laporan.create")}}',
            //     success :function(){
            //         window.location.href = url + "/" + date
            //     }
            // })
           
        }
            });
      calendar.render();
    });
    

  </script>
</body>

</html>

@endsection

@section('optionaljs')
{{-- Data Table --}}
<script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
{{-- Form Validation --}}
<script src="{{ asset('assets/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/plugins/validation/jquery.validate-init.js') }}"></script>
{{-- Calendar --}}

<!-- Custom script -->
{{-- <script src="{{asset('assets/plugins/common/common.min.js')}}"></script>
<script src="{{asset('assets/js/custom+mini-nav.js') }}"></script>
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
<script src="{{asset('assets/plugins/fullcalender/js/fullcalendar.min.js') }}"></script>
<script src="{{asset('assets/plugins/fullcalender/js/fullcalendar-init.js') }}"></script> --}}
@endsection
