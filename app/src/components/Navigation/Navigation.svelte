<script>
    import { menu } from 'store'

    import Save from './Save'

    import Section from './Item/Section'

    import External from './Item/External'

    import Separator from './Item/Separator'

    $: if (typeof $menu === 'object') menu.set(Object.values($menu))

    let types = {
        section: Section,
        external: External,
        separator: Separator,
    }

    $: items = $menu.sort(function (a, b) {
        return a.priority - b.priority;
    });
</script>

<style lang="scss">
    nav {
        width: 190px;
        margin: 0;
        padding: 20px;
        height: 100%;
        box-sizing: border-box;
        background: #00000009;
        position: absolute;
        left: 0;
        top: 0;
        border-radius: 5px 0px 0px 5px;

        ul {
            margin: 0;
            padding: 0;
            overflow: hidden;

            :global > li {
                float: left;
                width: 100%;
                margin: 0px 0px 4px 0px;

                &.active a {
                    background: #0000000d;
                    opacity: 1;
                }

                a {
                    color: var(--pco-primary-text);
                    width: 100%;
                    text-transform: capitalize;
                    font-weight: 900;
                    font-size: 13px;
                    cursor: pointer;
                    transition: 0.3s;
                    position: relative;
                    height: 34px;
                    line-height: 36px;
                    padding: 0px 10px;
                    box-sizing: border-box;
                    border-radius: var(--pco-border-radius);
                    text-decoration: none;
                    float: left;
                    outline: none;
                    box-shadow: none;
                    opacity: .225;
                    letter-spacing: .2px;

                    i {
                        float: left;
                        margin-right: 8px;
                        font-size: 16px;
                        font-weight: 100;
                        line-height: 34px;
                    }
                }
            }
        }
    }
</style>

<nav>
    <ul>
        {#each items as item}
            <svelte:component this={types[item.type]} {...item} />
        {/each}
    </ul>

    <Save />
</nav>