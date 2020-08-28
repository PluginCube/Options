<script>
    export let id;
    export let style = 'success';
    export let message;

    let close = () => {

    }
</script>

<style>
    li {
        float: right;
        padding: 0 13px;
        border-radius: 3px;
        text-align: center;
        font-weight: 700;
        line-height: 35px;
    }

    span {
        margin-right: 15px;
    }

    i {
        font-size: 16px;
        line-height: inherit;
        cursor: pointer;
    }

    li.success {
        background: #bae1c7;
        color: #31c061;
    }
    
    li.error {
        background: #f1b3b3b5;
        color: #e35f5f;
    }
    
    li.info {
        background: #d8d8d8;
        color: #9fa0a0;
    }
</style>

<li class={style}>
    <span>{message}</span>
    <i on:click={close} class="dashicons dashicons-dismiss"></i>
</li>