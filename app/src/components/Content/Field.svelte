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
        padding: 18px 0px;
        min-height: 40px;
                        
        header {
            float: left;
            width: 35%;
            font-weight: 700;
            font-size: 14px;
            color: var(--pco-primary-text);
            margin-right: 15%;
            font-family: 'Nunito', sans-serif;
            
            p {
                font-size: 12px;
                line-height: 22px;
                font-weight: 400;
                color: var(--pco-secondary-text);
                margin: 20px 0px 10px 0px;
            }
        }

        main {
            float: left;
            width: 50%;

            p {
                color: red;
            }
        }

        &.mini {
            padding: 20px;
            margin-bottom: 5px;
            background: #f1f1f1;
            box-sizing: border-box;
            border-radius: 3px;

            main {
                float: left;
                width: 100%;

                > :global(select) {
                    width: 100%;
                }
            }

            header {
                float: left;
                margin-bottom: 10px;
                width: 100%;

                span {
                    font-size: 13px;
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