<script>
    export let value
    export let args
    export let errors
    export let mini
    export let animate

    import { fade } from 'svelte/transition'

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
        padding: 28px 0px;

        header {
            float: left;
            width: 35%;
            font-weight: 700;
            font-size: 14px;
            color: var(--co-primary-text);
            margin-right: 15%;
            font-family: 'Nunito', sans-serif;
            
            p {
                font-size: 12px;
                line-height: 22px;
                font-weight: 400;
                color: var(--co-secondary-text);
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
            padding: 0px 0px 30px 0px;
            min-height: 34px;

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

                span {
                    font-size: 13px;
                }
            }
        }
    }
</style>

<div transition:fade={{ duration: animate ? 150 : 0 }} class:mini>
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