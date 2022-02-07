<div class="modal fade" id="editBooksModal{{ $nv->id }}" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookModalLabel">修改栏目分类</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form action="{{ route('admin.newscategory.update', $nv) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">栏目名称:</label>
                        <input type="text" class="form-control" name="name" value="{{ $nv->name }}">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">栏目简介:</label>
                        <textarea class="form-control" style="resize: none;" name="description" rows="15">{{ $nv->description }}</textarea>
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
