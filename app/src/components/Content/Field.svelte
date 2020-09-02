<script>
	export let type
	export let value
	export let title = null
	export let description = undefined
	export let options = {}
    export let errors = undefined
    
	import controls from './Controls/*.svelte';

    let types = [];

    controls.forEach(component => {
        let name = component.name.charAt(0).toLowerCase() + component.name.slice(1)
        types[name] = component;
    });
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