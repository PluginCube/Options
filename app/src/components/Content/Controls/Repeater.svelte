<script>
    export let value
    export let args

    import { onDestroy, onMount, afterUpdate } from 'svelte'

    import striptags from 'striptags'

    import { arrayMove, visiableFields } from 'methods'

    import Button from '../../Comman/Button'
    import Link from './Link.svelte';

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

    let remove = (item) => {
        let alertMsg = args.remove_alert || $translation.confirm;
        
        if (confirm(alertMsg)) {
            value = value.filter((i) => i._id !== item._id)
            window._active_item = null
        }
    }

    let duplicate = (item, i) => {
        item = JSON.parse(JSON.stringify(item));

        let changeIds = (item) => {
            for (const field in item) {
                if (field == '_id') {
                    item[field] = generateId();
                }

                if (Array.isArray(item[field])) {
                    item[field] = item[field].map(i => changeIds(i))
                }
            }

            return item;
        }

        item = changeIds(item);

        value = [
            ...value.slice(0, i),
            item,
            ...value.slice(i)
        ]

        toggle(item)
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
    ul.pco-repeater-list {
        margin-bottom: 4%;
        margin-top: 0;
        padding: 0;
        float: left;
        width: 100%;
        display: flex;
        flex-wrap: wrap;

        > li {
            box-shadow: var(--pco-box-shadow);
            background: var(--pco-control-bg);
            border-radius: var(--pco-border-radius);
            margin-bottom: 5%;
            width: 100%;
            margin-right: auto;
            border: var(--pco-control-border);
            box-sizing: border-box;

            > header {
                position: relative;
                width: 100%;
                float: left;
                box-sizing: border-box;
                line-height: 46px;
                height: 46px;
                cursor: pointer;
                padding: 0px 15px;
                overflow: hidden;
                                                
                > svg {
                    width: 10px;
                    height: 10px;
                    display: block;
                    fill: var(--pco-primary-text);
                    flex-shrink: 0;
                    backface-visibility: hidden;
                    margin-top: 17px;
                    margin-right: 12px;
                    cursor: move;
                    float: left;
                    opacity: .35;
                }

                > span {
                    font-weight: 800;
                    font-size: 13px;
                    color: var(--pco-primary-text);
                    position: relative;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    width: calc(100% - 100px);
                    max-width: calc(100% - 100px);
                    float: left;
                    padding-right: 10px;
                    overflow: hidden;
                    opacity: .9;
                }

                i {
                    float: right;
                    line-height: inherit;
                    font-size: 12px;
                    color: var(--pco-primary-text);
                    opacity: .2;
                    margin-left: 6px;
                    
                    &:hover {
                        opacity: .5;
                    }
                }
            }

            main {
                padding: 16px 16px 10px;
                box-sizing: border-box;
                display: block;
                float: left;
                width: inherit;
                --pco-box-shadow: 0px 3px 3px #00000005;
                --pco-control-border: 1px solid #00000014;
            }
        }
    }
</style>

{#if value.length}
    <ul class="pco-repeater-list" bind:this={list}>
        {#each value as item, i (item)}
            <li>
                <header on:click={(e) => toggle(item, e)}>
                    <svg viewBox="0 0 10 10">
                        <path d="M3,2 C2.44771525,2 2,1.55228475 2,1 C2,0.44771525 2.44771525,0 3,0 C3.55228475,0 4,0.44771525 4,1 C4,1.55228475 3.55228475,2 3,2 Z M3,6 C2.44771525,6 2,5.55228475 2,5 C2,4.44771525 2.44771525,4 3,4 C3.55228475,4 4,4.44771525 4,5 C4,5.55228475 3.55228475,6 3,6 Z M3,10 C2.44771525,10 2,9.55228475 2,9 C2,8.44771525 2.44771525,8 3,8 C3.55228475,8 4,8.44771525 4,9 C4,9.55228475 3.55228475,10 3,10 Z M7,2 C6.44771525,2 6,1.55228475 6,1 C6,0.44771525 6.44771525,0 7,0 C7.55228475,0 8,0.44771525 8,1 C8,1.55228475 7.55228475,2 7,2 Z M7,6 C6.44771525,6 6,5.55228475 6,5 C6,4.44771525 6.44771525,4 7,4 C7.55228475,4 8,4.44771525 8,5 C8,5.55228475 7.55228475,6 7,6 Z M7,10 C6.44771525,10 6,9.55228475 6,9 C6,8.44771525 6.44771525,8 7,8 C7.55228475,8 8,8.44771525 8,9 C8,9.55228475 7.55228475,10 7,10 Z"/>
                    </svg>

                    <span>{striptags(item[Object.keys(item)[0]])}</span>

                    <i class={activeItem === item._id ? 'ri-arrow-up-s-fill' : 'ri-arrow-down-s-fill'}/>

                    <i class="ri-close-circle-fill" on:click|stopPropagation={() => remove(item)}></i>

                    <i class="ri-file-copy-fill" on:click|stopPropagation={() => duplicate(item, i)}></i>
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
                    </main>
                {/if}
            </li>
        {/each}
    </ul>
{/if}

{#if args.limit && args.limit_link && value.length >= args.limit}
    <Link args={args.limit_link}/>
{:else}
    <Button small on:click={add}>
        {$translation.add_item}
    </Button>
{/if}
