<script>
    export let value
    export let options

    import SvelteTooltip from 'svelte-tooltip';
</script>

<style lang="scss">
    ul {
        float: left;
        margin: 0;
        padding: 0;
        box-shadow: var(--cf-box-shadow);
        border: var(--cf-control-border);

        li {
            float: left;
            margin: 0px;
            color: var(--cf-secondary-text);
            line-height: 12px;

            &.selected i{
                background: #f8f5f5;
                color: var(--cf-brand);
            }

            i {
                float: left;
                line-height: 35px;
                width: 40px;
                text-align: center;
                background: #fff;
                font-size: 15px;
                cursor: pointer;
            }

            &:first-of-type i {
                border-radius: var(--cf-border-radius) 0 0 var(--cf-border-radius);
            }

            &:last-of-type i {
                border-radius: 0 var(--cf-border-radius) var(--cf-border-radius) 0;
            }

            &:global{
                .tooltip-wrapper {
                    float: left;
                }

                .tooltip{
                    box-shadow: var(--cf-box-shadow);
                } 
            } 
        }
    }
</style>

<ul>
    {#each options.choices as choice}
        <li class:selected={value == choice.id} on:click={() => value = choice.id}>
            <SvelteTooltip tip={choice.title} color="#ffffff" top>
                <i class={choice.icon}></i>
            </SvelteTooltip>
        </li>
    {/each}
</ul>