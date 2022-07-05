@extends('layouts.admin')
@section('title', 'Add Auction')
@section('main')

    <form action="{{ route('auction.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col-md-6">
                
                <div class="form-group">
                    <label for="">Thời gian bắt đầu</label>
                    <input type="datetime-local" id="start_time" name="start_time">
                    @error('start_time')
                        <small class="help-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Auction</label>
                    <input type="text" class="form-control" name="name" placeholder="Auction Name">
                    @error('name')
                        <small class="help-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="0" checked>Preview
                        </label>
                        <label>
                            <input type="radio" name="status" value="1">Publish
                        </label>
                    </div>
                </div>

               
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="text" id="content" class="form-control" name="description" placeholder="Product Description"></textarea>
                    @error('description')
                        <small class="help-block">{{ $message }}</small>
                    @enderror
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Thời gian kết thúc</label>
                    <input type="datetime-local" id="close_time" name="close_time">
                    @error('description')
                        <small class="help-block">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="">Giá khởi điểm</label>
                    <input type="text" class="form-control" name="start_price" placeholder="Giá khởi điểm">
                    @error('start_price')
                        <small class="help-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Bước giá</label>
                    <input type="text" class="form-control" name="step_price" placeholder="Bước giá">
                    @error('step_price')
                        <small class="help-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Giá cao nhất</label>
                    <input type="text" class="form-control" name="highest_price" placeholder="Giá cao nhất">
                    @error('highest_price')
                        <small class="help-block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Winner Id</label>
                    <input type="hidden" class="form-control" name="winner_id" placeholder="Giá cao nhất">
                    @error('winner_id')
                        <small class="help-block">{{ $message }}</small>
                    @enderror
                </div>
              
               
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tạo mới</button>
    </form>


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-custom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('public/file/dialog.php?field_id=image') }}" frameborder="0"
                        style="width: 100%;height:500px;overflow-y:auto;border:none"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="model_list" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-custom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('public/file/dialog.php?field_id=image_list') }}" frameborder="0"
                        style="width: 100%;height:500px;overflow-y:auto;border:none"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

   
    <style>
        small {
            color: red;
        }
    </style>

@stop()
@section('css')
    <link rel="stylesheet" href="{{ url('public/ad123') }}/plugins/summernote/summernote-bs4.min.css">
@stop()
@section('js')
    <script src="{{ url('public/ad123') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('#content').summernote({
                height: 150,
                placeholder: "Product Description..."
            });
        });
        
        $('#modelId').on('hide.bs.modal', event => {
            var _link=$('#image').val();
            var _img="{{url('public/uploads')}}"+'/'+_link;
            
            $('#show_img').attr('src',_img);
        });
        $('#model_list').on('hide.bs.modal', event => {
            var _links=$('#image_list').val();
            var _args=$.parseJSON(_links);
            var _html='';
            for(let i=0;i< _args.length;i++){
                let _url ="{{url('public/uploads')}}"+'/'+ _args[i];
                _html += '<div class="col-md-4">';
                _html += '<img src="'+_url+'" alt="" style="width:100%">';
                _html += '</div>';
            }
            $('#show_image_list').html(_html);
            
        });
    </script>

@stop()
