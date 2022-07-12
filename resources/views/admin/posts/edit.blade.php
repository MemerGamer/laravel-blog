<x-layout>
    <style>
        #thumbnail-img {
            transition: transform 0.25s ease;
        }

        #thumbnail-img:hover {
            -webkit-transform: scale(1.5);
            transform: scale(1.25);
        }
    </style>
    <x-setting :heading="'Edit Post: '.$post->title">
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title',$post->title)"/>
            <x-form.input name="slug" :value="old('slug',$post->slug)"/>
            <div class="flex mt-5">
                <div class="flex-1">
                    <x-form.input name="thumbnail"
                                  type="file"
                                  :value="old('thumbnail',$post->thumbnail)"/>
                </div>
                <div class="ml-6">
                    <p class="ml-1 mb-2">Preview:</p>
                    <img src="{{asset('storage/'.$post->thumbnail)}}"
                         id="thumbnail-img"
                         alt="Old Thumbnail"
                         class="rounded-xl"
                         width="150"
                    >
                </div>
            </div>

            <x-form.textarea name="excerpt">{{old('excerpt',$post->excerpt)}}</x-form.textarea>
            <x-form.textarea name="body">{{old('body',$post->body)}}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category_id"/>

                <select name="category_id" id="category_id">
                    @foreach( \App\Models\Category::all() as $category)
                        <option
                            value="{{$category->id}}"
                            {{old('category_id',$post->category_id) == $category->id ? 'selected' : ''}}
                        >
                            {{ucwords($category->name)}}
                        </option>
                    @endforeach
                </select>

                <x-form.error name="category_id"/>

            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
