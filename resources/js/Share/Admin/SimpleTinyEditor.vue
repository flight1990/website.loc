`
<template>
    <Editor
        api-key="xcnykoky7wz5aq4opt33o6n7eng7x7vjjt8qnmfpirm62ovi"
        :init="{
            height: 250,
            menubar:false,
            branding: false,
            plugins: ['wordcount', 'code', 'fullscreen', 'lists'],
            toolbar: ['bold italic underline blockquote | bullist numlist | align | formatselect | code fullscreen']
        }"
    />
</template>

<script>
import Editor from '@tinymce/tinymce-vue';

export default {
    name: "SimpleTinyEditor",
    components: {
        Editor
    },
    data() {
        return {
            baseUrl: import.meta.env.VITE_APP_URL
        }
    },
    methods: {
        filePickerCallback(cb, value, meta) {

            const input = document.createElement('input');

            input.setAttribute('type', 'file');
            input.setAttribute('accept', '.txt, application/pdf');

            input.onchange = function () {
                let file = this.files[0];
                let reader = new FileReader();
                let fd = new FormData();

                fd.append("file", file);

                let filename = "";

                $.ajax({
                    url: '/admin/upload/file',
                    type: "post",
                    data: fd,
                    contentType: false,
                    processData: false,
                    async: false,
                    success: function (response) {
                        filename = response.location;
                    }

                });

                reader.onload = function(e) {
                    cb(filename, { title: file.name, text: file.name });
                };

                reader.readAsDataURL(file);
            }

            input.click();
        }
    }
}
</script>
`
