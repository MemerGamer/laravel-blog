<x-layout>
    <x-setting heading="Manage Posts">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">

                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="/posts/{{$post->slug}}">
                                                    {{$post->title}}
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Published
                                    </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/admin/posts/{{$post->id}}/edit"
                                           class="text-blue-500 hover:text-blue-600">
                                            Edit
                                        </a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST"
                                              action="/admin/posts/{{$post->id}}"
                                              x-data="{conf: false, check: false}"
                                              @submit.prevent="if(conf == false) return;$el.submit()"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="bg-red-500 ml-2   text-white font-bold py-1 px-3 rounded text-xs  hover:bg-red-700"
                                                @click="check = confirm('Are you sure want delete: {{$post->title}}?'); conf = check;"
                                                type="submit"
                                            >Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                            <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
