<div class="modal fade" id="addNewsCategoryModal" tabindex="-1" aria-labelledby="addNewsCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewsCategoryModalLabel">新增栏目分类</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
           <form action="{{ route('admin.newscategory.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
               {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">栏目名称:</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">栏目描述:</label>
                        <textarea class="form-control" style="resize: none;" name="description" rows="15">{{ old('description') }}</textarea>
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
