<form action="/create-post" method="post">
    @csrf
    <div>
        <label for="">Title :</label>
        <textarea name="title" id="">
        </textarea>
    </div>
    <div>
        <label for="">Category</label>
        <select name="category_id" id="">
            @foreach ($category as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="">Sub title</label>
        <textarea name="sub_title" id="">
        </textarea>
    </div>
    <div>
        <label for="">Content</label>
        <textarea name="comment" id="">
        </textarea>
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>
