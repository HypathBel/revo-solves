<?php

namespace App\Enums;

enum GithubEvent: string
{
    case PushEvent = 'PushEvent';
    case CreateEvent = 'CreateEvent';
    case IssuesEvent = 'IssuesEvent';
    case CommitCommentEvent = 'CommitCommentEvent';
    case OTHER = 'OTHER';
}
