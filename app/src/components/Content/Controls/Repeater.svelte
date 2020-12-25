<script>
    export let value
    export let args

    import { onDestroy, onMount, afterUpdate } from 'svelte'

    import { arrayMove, visiableFields } from 'methods'

    import Button from '../../Comman/Button'

    import { translation } from 'store'

    import Field from '../Field'

    $: if (!value) value = []

    let list
    let activeItem

    $: vrfields = activeItem ? visiableFields(args.fields, activeItem) : []

    let toggle = (item) => {
        activeItem === item ? (activeItem = null) : (activeItem = item)
    }
    
    let add = () => {
        let item = {}

        args.fields.forEach((field) => {
            let value = field['default'] !== 'undefined' ? field['default'] : null
            item[field.id] = value
        })

        value = [...value, item]
    }

    let remove = () => {
        if (confirm($translation.confirm)) {
            value = value.filter((i) => i !== activeItem)
        }
    }

    let initSortable = () => {
        jQuery(list).sortable({
            handle: 'header > svg',
            start: function (event, ui) {
                jQuery(this).attr('data-previndex', ui.item.index())
            },
            update: function (event, ui) {
                let from = parseInt(jQuery(this).attr('data-previndex'))
                let to = ui.item.index()

                value = arrayMove(value, from, to)
            },
        })
    }

    onMount(() => {
        if (value.length) {
            initSortable()
        }
    })

    onDestroy(() => {
        jQuery(list).sortable('destroy')
    })

    afterUpdate(() => {
        if (value.length) {
            initSortable()
        }
    })
</script>

<style lang="scss">
    ul {
        margin-bottom: 20px;
        margin-top: 0;
        padding: 0;
        float: left;
        width: 100%;

        li {
            box-shadow: var(--co-box-shadow);
            background: #fff;
            border-radius: var(--co-border-radius);
            margin-bottom: 12px;
            width: 100%;
            overflow: hidden;
            margin-right: auto;
            border: var(--co-control-border);

            header {
                padding: 0px 15px;
                position: relative;
                overflow: hidden;
                width: 100%;
                float: left;
                box-sizing: border-box;
                line-height: 48px;
                height: 48px;
                cursor: pointer;

                svg {
                    width: 12px;
                    height: 12px;
                    display: block;
                    fill: #adabab;
                    flex-shrink: 0;
                    backface-visibility: hidden;
                    margin-top: 18px;
                    margin-right: 12px;
                    cursor: move;
                    float: left;
                }

                span {
                    font-weight: 800;
                    font-size: 13px;
                    color: var(--co-secondary-text);
                    top: 0px;
                    line-height: 48px;
                    position: relative;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    width: 200px;
                    max-width: calc(100% - 40px);
                    float: left;
                    overflow: hidden;
                    font-family: 'Nunito', sans-serif;
                }

                i {
                    float: right;
                    line-height: inherit;
                    font-size: 14px;
                    color: #b2b2b2;
                }
            }

            main {
                padding: 20px;
                border-top: 1px solid #f1f1f1;
                float: left;
                width: 100%;
                box-sizing: border-box;
                --co-box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.05);

                button {
                    background: #ff0000;
                    border: none;
                    height: 22px;
                    padding: 0px 8px;
                    color: #ffffff;
                    border-radius: 3px;
                    font-size: 12px;
                    cursor: pointer;
                    margin-top: 10px;
                }
            }
        }
    }
</style>

{#if value.length}
    <ul bind:this={list}>
        {#each value as item, i (item)}
            <li>
                <header on:click={() => toggle(item)}>
                    <svg viewBox="0 0 10 10">
                        <path
                            d="M3,2 C2.44771525,2 2,1.55228475 2,1 C2,0.44771525 2.44771525,0 3,0 C3.55228475,0 4,0.44771525 4,1 C4,1.55228475 3.55228475,2 3,2 Z M3,6 C2.44771525,6 2,5.55228475 2,5 C2,4.44771525 2.44771525,4 3,4 C3.55228475,4 4,4.44771525 4,5 C4,5.55228475 3.55228475,6 3,6 Z M3,10 C2.44771525,10 2,9.55228475 2,9 C2,8.44771525 2.44771525,8 3,8 C3.55228475,8 4,8.44771525 4,9 C4,9.55228475 3.55228475,10 3,10 Z M7,2 C6.44771525,2 6,1.55228475 6,1 C6,0.44771525 6.44771525,0 7,0 C7.55228475,0 8,0.44771525 8,1 C8,1.55228475 7.55228475,2 7,2 Z M7,6 C6.44771525,6 6,5.55228475 6,5 C6,4.44771525 6.44771525,4 7,4 C7.55228475,4 8,4.44771525 8,5 C8,5.55228475 7.55228475,6 7,6 Z M7,10 C6.44771525,10 6,9.55228475 6,9 C6,8.44771525 6.44771525,8 7,8 C7.55228475,8 8,8.44771525 8,9 C8,9.55228475 7.55228475,10 7,10 Z"
                        />
                    </svg>

                    <span>{item[Object.keys(item)[0]]}</span>

                    <i
                        class={activeItem === item ? 'ri-arrow-up-s-fill' : 'ri-arrow-down-s-fill'}
                    />
                </header>

                {#if activeItem === item}
                    <main>
                        {#each vrfields as field (field.id)}
                            <Field
                                animate={false}
                                mini={true}
                                errors={false}
                                args={field}
                                bind:value={value[i][field.id]}
                            />
                        {/each}

                        <button on:click={remove}>
                            {$translation.remove}
                        </button>
                    </main>
                {/if}
            </li>
        {/each}
    </ul>
{/if}

<Button on:click={add}>
    {$translation.add_item}
</Button>