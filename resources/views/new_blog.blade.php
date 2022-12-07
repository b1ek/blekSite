<x-template.master>
    <h3>
        {{isset($edit) ? ($edit ? 'Edit' : 'New') : 'New'}}
        blog post
    </h3>
    <hr/>
    <form action='/panel/new'>
        @csrf


        Title: <input type='text' name='title'
        @if (isset($title))
        value='{!!$title!!}'
        @endif
        ></input><br/>

        
        Author: <input type='text' name='author'
        @if (isset($author))
        value='{!!$author!!}'
        @else
        value='blek!'
        @endif
        ></input><br/>


        <p>
            Text:<br/>
            <textarea name='text'>{!! isset($body) ? $body : '' !!}</textarea>
        </p>

        
        @if (isset($id))
        <input type='hidden' name='id' value='{!!$id!!}'></input>
        @endif
        <input type='submit' value='Send'></input>
    </form>
</x-template.master>