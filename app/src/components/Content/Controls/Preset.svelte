<script>
    export let args

    import { translation, values } from 'store'

    import Button from '../../Comman/Button'

    import { save } from 'methods'

    import merge from 'deepmerge'

    $: args = merge(
        {
            presets: [],
            reload: false,
        },
        args
    )

    let load = async (data) => {
        if (confirm($translation.confirm)) {
            let newData = merge($values, data)

            values.set(newData)

            await save()

            if (args.reload) {
                location.reload()
            }
        }
    }
</script>

<style lang="scss">
    ul {
        float: left;
        margin: 0px -10px 0px 0px;
        padding: 0;

        li {
            float: left;
            max-width: calc(50% - 10px);
            margin: 0px 10px 10px 0px;
            box-sizing: border-box;
            display: block;
            padding: 0;
            cursor: pointer;
            border-radius: var(--pco-border-radius);
            overflow: hidden;
            box-shadow: var(--pco-box-shadow);

            img {
                float: left;
                max-width: 100%;
            }

            div {
                padding: 10px;
                float: left;
                display: flex;
                width: 100%;
                box-sizing: border-box;
                line-height: 11px;
                background: var(--pco-control-bg);
                align-items: center;
                justify-content: space-between;

                span {
                    font-size: 11px;
                    float: left;
                    color: var(--pco-primary-text);
                    text-transform: capitalize;
                }

                button {
                    float: right;
                }
            }
        }
    }
</style>

<ul>
    {#each args.presets as preset}
        <li>
            <img src={preset.img} alt={preset.title} />

            <div>
                {#if preset.title}<span>{preset.title}</span>{/if}

                <Button small on:click={() => load(preset.data)}>
                    {$translation.import}
                </Button>
            </div>
        </li>
    {/each}
</ul>