<script>
    export let value
    export let args

    import { onDestroy, onMount, afterUpdate } from 'svelte'

    import striptags from 'striptags'

    import { arrayMove, visiableFields } from 'methods'

    import Button from '../../Comman/Button'

    import { translation } from 'store'

    import Field from '../Field'

    $: if (!value) value = []

    let list
    let activeItem = window._active_item || null

    $: vrfields = activeItem ? visiableFields(args.fields, value.find(i => i._id == activeItem)) : []

    let generateId = () => '_' + Math.random().toString(36).substring(7);

    let toggle = (item) => {
        if (activeItem === item._id) {
            activeItem = null
            window._active_item = null
        } else {
            activeItem = item._id
        }
    }
    
    let add = () => {
        let item = {}

        args.fields.forEach((field) => {
            let value = field['default'] !== 'undefined' ? field['default'] : null
            item[field.id] = value
        })

        item['_id'] = generateId()

        value = [...value, item]
    }

    let remove = () => {
        let alertMsg = args.remove_alert || $translation.confirm;
        
        if (confirm(alertMsg)) {
            value = value.filter((i) => i._id !== activeItem)
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

            /* 
             * Make sure every item has an _id
             */
            value = value.map(i => {
                if ( ! i._id ) {
                    i._id = generateId()
                }

                return i
            })
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
            box-shadow: var(--pco-box-shadow);
            background: #fff;
            border-radius: var(--pco-border-radius);
            margin-bottom: 12px;
            width: 100%;
            display: inline-block;
            margin-right: auto;
            border: var(--pco-control-border);

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
                    color: var(--pco-secondary-text);
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
                --pco-box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.05);

                button {
                    border: 1px solid #e2e2e2;
                    background: transparent;
                    height: 24px;
                    line-height: 1;
                    padding: 0px 10px 0px 5px;
                    color: #999;
                    border-radius: 20px;
                    font-size: 11px;
                    cursor: pointer;
                    margin-top: 20px;
                    font-family: 'Nunito', sans-serif;
                    display: flex;
                    align-items: center;
                    float: left;
                    font-weight: 800;

                    i {
                        margin-right: 5px;
                        font-weight: 100;
                        font-size: 14px;
                    }
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

                    <span>{striptags(item[Object.keys(item)[0]])}</span>

                    <i
                        class={activeItem === item._id ? 'ri-arrow-up-s-fill' : 'ri-arrow-down-s-fill'}
                    />
                </header>

                {#if activeItem === item._id}
                    <main>
                        {#each vrfields as field (field.id)}
                            <Field
                                animate={false}
                                mini={true}
                                errors={false}
                                args={{...field, activeItemValues: value.find(i => i._id == activeItem)}}
                                bind:value={value[i][field.id]}
                            />
                        {/each}

                        <button on:click={remove}>
                            <i class="ri-close-circle-fill"></i>
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