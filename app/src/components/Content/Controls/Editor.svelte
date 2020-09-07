<script>
    export let value;
    
    import { onMount, onDestroy } from 'svelte'


    let id = 'x' + Math.random().toString(36).substr(2, 9);
    let editor = null;

    let initEditor = (edt) => {
        editor = edt;

        editor.on('KeyUp Change Undo Redo paste', (e) => {
            value = editor.getContent()
        });

        editor.on('init', (e) => {
            editor.setContent(value);
        });
    }

    onMount(() => {
        let options = {
            selector: '#' + id,
            menubar: false,
            plugins: wp.editor.getDefaultSettings().tinymce.plugins + ',image',
            toolbar1: "formatselect,alignleft,aligncenter,alignright,alignjustify,bold,italic,bullist,numlist,image,link,fullscreen",
            wpeditimage_html5_captions: true,
            branding: false,
            init_instance_callback : initEditor
        };

        tinymce.init(options);
    });

    onDestroy(() => {
        editor.destroy();
    });
</script>

<style lang="scss">
    :global {
        .mce-top-part::before {
            box-shadow: none !important;
        }

        .mce-tinymce{
            box-shadow: var(--cf-box-shadow) !important;
            border-radius: var(--cf-border-radius);
            overflow: hidden;
            border: var(--cf-control-border) !important;
        }

        .mce-container iframe {
            min-height: 130px;
        }

        div.mce-toolbar-grp {
            border-bottom: 1px solid #e5e5e5 !important;
            background: transparent !important;
            padding: 0 !important;
            position: relative !important;
        }

        .mce-btn-group:not(:first-child){
            border: none !important;
        }
    }
</style>

<textarea id={id}>{value}</textarea>