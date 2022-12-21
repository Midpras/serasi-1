@extends('layouts.main')

@section('container')


<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Calendar</h4>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card-box m-b-50">
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <!-- end col -->
                    <!-- BEGIN MODAL -->
                    <div class="modal fade none-border" id="event-modal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add New Event</strong></h4>
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                    <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Add Category -->
                    <div class="modal fade none-border" id="add-category">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><strong>Add a category</strong></h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">Category Name</label>
                                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Choose Category Color</label>
                                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                    <option value="success">Success</option>
                                                    <option value="danger">Danger</option>
                                                    <option value="info">Info</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="primary">Primary</option>
                                                    <option value="warning">Warning</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MODAL -->
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
<script src="{{asset('assets/plugins/fullcalender/js/fullcalendar.min.js') }}"></script>
<script src="{{asset('assets/plugins/fullcalender/js/fullcalendar-init.js') }}"></script>
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
