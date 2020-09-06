<script>
	export let type
	export let value
	export let title = null
	export let description = undefined
	export let options = {}
    export let errors = undefined
    
    import Text from './Controls/Text.svelte'
    import Textarea from './Controls/Textarea.svelte'
    import Switch from './Controls/Switch.svelte'
    import Select from './Controls/Select.svelte'
    import Image from './Controls/Image.svelte'
    import Color from './Controls/Color.svelte'
    import Icon from './Controls/Icon.svelte';
    import Editor from './Controls/Editor.svelte';

    let types = {
        'text': Text,
        'textarea': Textarea,
        'switch': Switch,
        'select': Select,
        'image': Image,
        'color': Color,
        'icon': Icon,
        'editor': Editor
    };
    
</script>


<style>
    div {
        float: left;
        width: 100%;
        padding: 30px 0px;
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
</style>

<div>
    <header>
        {#if title}
            <span>{title}</span>
        {/if}
        
        {#if description}
            <p>{description}</p>
        {/if}
    </header>

    <main>
        <svelte:component this={types[type]} bind:value bind:options/>

        {#if errors}
            {#each errors as error}
                <p>{error}</p>   
            {/each}
        {/if}
	</main>
</div>