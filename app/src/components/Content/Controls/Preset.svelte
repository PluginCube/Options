<script>
    export let value;
    export let options;

    import { translation, values } from 'store'
    import { get } from 'svelte/store'
    import { save } from 'methods'

    import merge from 'deepmerge'

    let importDemo = async (data) => {
        if (confirm($translation.confirm)) {
                let newData = merge(get(values), data);

                values.set(newData);
                
                await save();

                if (options.reload) {
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
            border-radius: var(--cf-border-radius);
            overflow: hidden;
            box-shadow: var(--cf-box-shadow);

			img {
				float: left;
				max-width: 100%;
			}

            div {
                padding: 10px;
                float: left;
                width: 100%;
                box-sizing: border-box;
                line-height: 26px;
                background: #fff;

                span {
                    font-size: 11px;
                    float: left;
                    color: var(--cf-secondary-text);
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
    {#each options.presets as preset}
        <li>
            <img src={preset.img} alt={preset.title}>
            
            <div>
                {#if preset.title}
                    <span>{preset.title}</span>
                {/if}
                
                <button class="button button-primary button-small" on:click={() => importDemo(preset.data)}>
                    {$translation.import}
                </button>
            </div>
        </li>
    {/each}    
</ul>
