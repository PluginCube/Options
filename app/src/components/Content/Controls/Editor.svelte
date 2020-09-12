<script>
    export let value

    import { onMount, onDestroy } from 'svelte'

    let editor = null

    let id = '_' + Math.random().toString(36).substr(2, 9)

    let initEditor = (edt) => {
        editor = edt

        editor.on('KeyUp Change Undo Redo paste', (e) => {
            value = editor.getContent()
        })

        editor.on('init', (e) => {
            editor.setContent(value)
        })
    }

    let options = {
        selector: '#' + id,
        menubar: false,
        plugins: 'charmap,hr,lists,paste,,fullscreen,wordpress,,wpemoji,,image',
        toolbar1:
            'formatselect,alignleft,aligncenter,alignright,alignjustify,bold,italic,bullist,numlist,image,link,fullscreen',
        wpeditimage_html5_captions: true,
        branding: false,
        init_instance_callback: initEditor,
    }

    onMount(() => {
        setTimeout(() => tinymce.init(options), 300)
    })

    onDestroy(() => {
        if (editor) {
            editor.destroy()
        }
    })
</script>

<style lang="scss">
    :global {
        .mce-top-part::before {
            box-shadow: none !important;
        }

        .mce-fullscreen {
            z-index: 100010 !important;
            --cf-border-radius: 0;
        }

        .mce-tinymce {
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

        .mce-btn-group:not(:first-child) {
            border: none !important;
        }
    }
</style>

<textarea {id}>{value}</textarea>