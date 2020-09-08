<script>
	export let type
	export let value
	export let title = null
	export let description = undefined
	export let options = {}
    export let errors = undefined
    export let mini;

    import Text from './Controls/Text.svelte'
    import Textarea from './Controls/Textarea.svelte'
    import Switch from './Controls/Switch.svelte'
    import Select from './Controls/Select.svelte'
    import Image from './Controls/Image.svelte'
    import Color from './Controls/Color.svelte'
    import Icon from './Controls/Icon.svelte'
    import Editor from './Controls/Editor.svelte'
    import Repeater from './Controls/Repeater.svelte'
    import RadioImage from './Controls/RadioImage.svelte'
    import Export from './Controls/Export.svelte'
    import Import from './Controls/Import.svelte'

    let types = {
        'text': Text,
        'textarea': Textarea,
        'switch': Switch,
        'select': Select,
        'image': Image,
        'color': Color,
        'icon': Icon,
        'editor': Editor,
        'repeater': Repeater,
        'radio-image': RadioImage,
        'export': Export,
        'import': Import
    };
    
</script>


<style lang="scss">
    div {
        float: left;
        width: 100%;
        padding: 25px 0px;
    }

    header {
        float: left;
        width: 35%;
        font-weight: 600;
        font-size: 14px;
        color: var(--cf-primary-text);
        margin-right: 15%;
    }

    header p {
        font-size: 12px;
        line-height: 22px;
        font-weight: 400;
        color: var(--cf-secondary-text);
        margin: 15px 0px 0px 0px;
    }

    main {
        float: left;
        width: 50%;
    }

    main p {
        color: red;
    }

    .mini {
        padding: 0px 0px 30px 0px;

        main {
            float: left;
            width: fit-content;
            max-width: 100%;
        }
        
        header {
            float: left;
            width: fit-content;
            min-width: 50px;
            margin-bottom: 15px;
            color: var(--cf-secondary-text);
        }
    }
</style>

<div class:mini>
    <header>
        {#if title}
            <span>{title}</span>
        {/if}
        
        {#if description}
            <p>{description}</p>
        {/if}
    </header>

    <main>
        <svelte:component this={types[type]} {errors} bind:value bind:options/>

        {#if errors}
            {#each errors as error}
                <p>{error}</p>   
            {/each}
        {/if}
	</main>
</div>