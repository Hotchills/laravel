
$(document).ready(function () {
    var firsttopid = $('#clickdoc div').eq(0).attr('id');
    var i = Number(firsttopid.slice(6));
    show(i);

    $('.ShowTopsClass').on('click', '.pagination a', function (event)
    {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var url = $(this).attr('href');
        getData(page);
        window.history.pushState("", "", url);
    });
    $('.ShowCommentsClass').on('click', '.button_comments_Default', function () {
        var j = Number(this.id.slice(23));
        show_comments_class(2, j);
        console.log(' button default', j);
    });
    $('.ShowCommentsClass').on('click', '.button_comments_UpVote', function () {
        var k = Number(this.id.slice(22));
        show_comments_class(1, k);
        console.log(' button upvote', k);
    });
    $('#clickdoc').on('click', '.top-heading', function () {
        var i = Number(this.id.slice(6));
        show(i);
    });
});

function getData(page) {
    $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                datatype: "html",
            })
            .done(function (data)
            {
                $(".ShowTopsClass").empty().html(data);
                var firsttopid = $('#clickdoc div').eq(0).attr('id');
                var i = Number(firsttopid.slice(6));
                show(i);

                $('.ShowCommentsClass').on('click', '.button_comments_Default', function () {
                    var j = Number(this.id.slice(23));
                    show_comments_class(2, j);
                    console.log(' button default', j);
                });
                $('.ShowCommentsClass').on('click', '.button_comments_UpVote', function () {
                    var k = Number(this.id.slice(22));
                    show_comments_class(1, k);
                    console.log(' button upvote', k);
                });
                $('#clickdoc').on('click', '.top-heading', function () {
                    var x = Number(this.id.slice(6));
                    console.log('click', x);
                    show(x);
                });

            })
            .fail(function (jqXHR, ajaxOptions, thrownError)
            {
                alert('No response from server');
            });
}

function show(id) {
    var allDivs = document.getElementsByClassName('ascunde');
    var Divs = document.getElementsByClassName('top-heading');
    for (var i = 0; i < allDivs.length; i++) {
        allDivs[i].classList.remove('afiseaza');
    }
    document.getElementById('idi' + id).classList.add('afiseaza');

    for (var j = 0; j < Divs.length; j++) {
        Divs[j].style.backgroundColor = "white";
    }
    document.getElementById('top_nr' + id).style.backgroundColor = "#C0C0C0";

}

window.onscroll = function () {
    myFunction123();
};

/* var num = document.getElementById('myId').clientHeight; */
// mutiple requests on ajax : https://stackoverflow.com/questions/42873712/render-multiple-blade-view-sections-on-ajax-request

function upvotecomment(temp, vote) {

    document.getElementById('up_vote_comment' + temp).innerHTML = vote + 1;

    var commentid = temp;

    $.ajax({
        method: "POST",
        url: 'http://127.0.0.1:8000/incrementvote',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {commentid: commentid}
    })
            .done(function (msg) {
                console.log(msg['message']);
            });
}

function downvotecomment(temp, vote) {

    document.getElementById('down_vote_comment' + temp).innerHTML = vote + 1;

    var commentid = temp;

    $.ajax({
        method: "POST",
        url: 'http://127.0.0.1:8000/decrementvote',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {commentid: commentid}
    })
            .done(function (msg) {
                console.log(msg['message']);
            });
}

function deletecomment(temp) {

    var commentid = temp;

    $.ajax({
        method: "POST",
        url: 'http://127.0.0.1:8000/deletecomment',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {commentid: commentid}
    })
            .done(function (msg) {
                console.log(msg['message']);
            });
}

var num = 120;
function myFunction123() {
    if (document.body.scrollTop > num || document.documentElement.scrollTop > num) {
        document.getElementById("myId").className = "fixed";
    } else {
        document.getElementById("myId").className = "nav";
    }
}

function show_comment_children(id)
{
    var x = document.getElementById('show_comment_children' + id);
    var y = document.getElementById('show_comment_children_button' + id);
    if (x.style.display === 'none') {
        x.style.display = 'block';
        y.innerHTML = 'Hide replies &#10548;';
    } else {
        x.style.display = 'none';
        y.innerHTML = 'View all replies &#10549;';
    }
}

function show_comment_children_upvote(id)
{
    var x = document.getElementById('show_comment_children_upvote' + id);
    var y = document.getElementById('show_comment_children_button_upvote' + id);
    if (x.style.display === 'none') {
        x.style.display = 'block';
        y.innerHTML = 'Hide replies &#10548;';
    } else {
        x.style.display = 'none';
        y.innerHTML = 'View all replies &#10549;';
    }
}

function show_comments(id) {
    var x = document.getElementById('ds' + id);
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

function show_commentreplay(id) {
    var x = document.getElementById('replay' + id);
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

function open_comments(id) {
    var x = document.getElementById('ds' + id);
    if (x.style.display === 'none') {
        x.style.display = 'block';
    }
}

function show_comments_class(type, id) {

    var temp = type;
    var x = document.getElementById('ShowDefaultComments' + id);
    var y = document.getElementById('ShowUpVoteComments' + id);
    if (temp == 1) {
        x.style.display = 'none';
        y.style.display = 'block';

    } else if (temp == 2) {
        y.style.display = 'none';
        x.style.display = 'block';
    }
}

function modalfunction() {
// Get the modal
    var modal = document.getElementById('myModal');
// When the user clicks the button, open the modal 
    modal.style.display = "block";
}
// When the user clicks on button class close (x), close the modal
function modalfunctionclose() {
    var modal = document.getElementById('myModal');
    modal.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    var modal = document.getElementById('myModal');
    if (event.target === modal) {
        modal.style.display = "none";
    }
}