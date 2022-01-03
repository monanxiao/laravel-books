<div class="modal fade" id="editBooksModal{{ $bv->id }}" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalLabel">书名</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form action="{{ route('admin.books.update', $bv) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="form-group col-md-8">
                        <label for="recipient-name" class="col-form-label">名称:</label>
                        <input type="text" class="form-control" name="name" value="{{ $bv->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="recipient-name" class="col-form-label">作者:</label>
                        <input type="text" class="form-control" name="author" value="{{ $bv->author }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">封面:</label>
                        <div class="col-md-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput" id="uploadImageDiv">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{{ $bv->cover_src }}" alt="封面图" />
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                </div>
                                <div>
                                    <span class="btn default btn-file">
                                    <span class="fileinput-new">选择图片</span>
                                    <span class="fileinput-exists">更改</span>
                                        <input type="file" name="uploadImage" id="uploadImage" />
                                    </span>
                                    <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">移除</a>
                                    <span>请选择1M以内图片</span>
                                </div>
                            </div>
                            <div id="titleImageError" style="color: #a94442"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">简介:</label>
                        <textarea class="form-control" style="resize: none;" name="describe" rows="15">{{ $bv->describe }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </form>
        </div>
    </div>
</div>
