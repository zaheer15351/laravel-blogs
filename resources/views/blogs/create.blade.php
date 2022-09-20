

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('blog.store') }}">
        @csrf

            <div>
                <x-input-label for="title" :value="__('Blog Title')" />

                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" required />
            </div>

            <div class="mt-4">
                <x-input-label for="blog-body" :value="__('Content')" />
                <x-textarea-input id="blog-body" class="block mt-1 w-full" name="body" required />
            </div>




            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Create Blog') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@push('scripts')
<script>
    $(function(){
        tinymce.init({
            selector: '#blog-body',
            setup:function(editor) {
                editor.on('Change', function (e) {
                    tinyMCE.triggerSave();
                    var sd_data = $('#blog-body').val();
                    @this.set('blog-body', sd_data)

                })
            }
        });
    });
</script>
@endpush


