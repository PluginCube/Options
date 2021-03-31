<script>
    export let value
    export let args
    export let errors
    export let mini
    export let animate

    import modules from './Controls/*.svelte'

    let typeString = args.type.replace(new RegExp('-', 'g'), '')

    $: control = modules.find((x) =>
        x.fileName.toLowerCase().includes(typeString)
    ).module.default
</script>

<style lang="scss">
    div {
        float: left;
        width: 100%;
        padding-bottom: 55px;
        min-height: 40px;
                        
        header {
            float: left;
            width: 200px;
            font-weight: 800;
            font-size: 14px;
            color: var(--pco-secondary-text);
            padding-right: 15px;
            box-sizing: border-box;
            margin-right: 40px;
                        
            p {
                font-size: 12px;
                line-height: 16px;
                font-weight: 300;
                color: var(--pco-tertiary-text);
                margin: 14px 0px 0px 0px;
            }
        }

        main {
            float: left;
            width: calc(100% - 240px);

            > p {
                color: red;
            }
        }

        &.mini {
            padding: 16px;
            margin-bottom: 5px;
            background: #00000014;
            box-sizing: border-box;
            border-radius: 3px;
            width: inherit;
            
            main {
                float: left;
                width: 100%;

                > :global(select) {
                    width: 100%;
                }
            }

            header {
                float: left;
                margin-bottom: 14px;
                width: 100%;
                
                span {
                    font-size: 12.5px;
                    float: left;
                    font-weight: 800;
                    color: var(--pco-primary-text);
                }
            }
        }
    }
</style>

<div class:mini>
    <header>
        {#if args.title}<span>{args.title}</span>{/if}

        {#if args.description}
            <p>{args.description}</p>
        {/if}
    </header>

    <main>
        <svelte:component this={control} bind:value {args} />

        {#if errors}
            {#each errors as error}
                <p>{error}</p>
            {/each}
        {/if}
    </main>
</div>