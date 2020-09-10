<script>
    export let title
    export let icon
    export let url
</script>

<style>
    li {
        float: left;
        width: 100%;
        margin: 0px 0px 5px 0px;
    }

    a {
        color: var(--cf-primary-text);
        width: 100%;
        text-transform: capitalize;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        transition: .3s;
        position: relative;
        height: 34px;
        line-height: 38px;
        padding: 0px 12px;
        box-sizing: border-box;
        border-radius: var(--cf-border-radius);
        text-decoration: none;
        float: left;
        font-family: Josefin Sans,sans-serif;
        outline: none;
        box-shadow: none;
        letter-spacing: -.2px;
    }

    i {
        float: left;
        margin-right: 12px;
        font-size: 17px;
        margin-top: 0px;
        line-height: 34px;
        font-weight: 100;
    }
</style>

<li>
    <a href={url} target="_blank">
        <i class={icon}></i>
        {title}
    </a>
</li>