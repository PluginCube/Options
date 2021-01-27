<script>
    export let value
    export let args

    import Button from '../../Comman/Button'

    $: color = typeof args.color == 'string' ? args.color : '#fd1044';
    
    let click = () => {
        if ( args.url ) {
            args.url = (args.url.indexOf('://') === -1) ? 'http://' + args.url : args.url;
            window.open(args.url, "_blank");
        }
    }

    $: style = `font-weight: 700; padding: 0px 10px; margin-top: 10px; background: ${color};`;
</script>

<style>
    i {
        margin-right: 5px;
        font-weight: 100;
    }
</style>

<Button on:click={click} {style}>
    {#if args.icon}
        <i class={args.icon}></i>
    {/if}

    {args.text}
</Button>