<script>
    export let value
    export let args
    export let errors
    export let mini
    export let animate

    const { title, description, type, ...options } = args

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
        padding: 25px 0px;

        header {
            float: left;
            width: 35%;
            font-weight: 600;
            font-size: 14px;
            color: var(--cf-primary-text);
            margin-right: 15%;

            p {
                font-size: 12px;
                line-height: 22px;
                font-weight: 400;
                color: var(--cf-secondary-text);
                margin: 15px 0px 0px 0px;
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
        {#if title}<span>{title}</span>{/if}

        {#if description}
            <p>{description}</p>
        {/if}
    </header>

    <main>
        <svelte:component this={control} bind:value {options} />

        {#if errors}
            {#each errors as error}
                <p>{error}</p>
            {/each}
        {/if}
    </main>
</div>