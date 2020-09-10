<script>
    export let value;
    export let options;

    let icon = options.icon ? options.icon : 'ri-page-separator';
    
    delete(options.icon)
</script>

<style lang="scss">
    div {
        position: relative;
        float: left;
        border: var(--cf-control-border) !important;
        box-shadow: var(--cf-box-shadow) !important;
        border-radius: var(--cf-border-radius);
        overflow: hidden;

        i {
            float: left;
            font-size: 14px;
            position: absolute;
            right: 0px;
            background: #f8f8f8;
            width: 32px;
            height: 100%;
            line-height: 34px;
            text-align: center;
            border-left: var(--cf-control-border);
            cursor: pointer;
            padding-right: 1px;
            color: var(--cf-secondary-text);
        }

        input {
            float: left;
            width: 110px;
            max-width: 100%;
            padding: 4px 12px;
            font-size: 13px;
            border: none;
            box-shadow: none;
            border-radius: 0px;
            margin: 0;
        }
    }

</style>

<div>
    <i class={icon}></i>    
    <input type="number" bind:value {...options}>
</div>
