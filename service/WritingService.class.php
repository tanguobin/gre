<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-10
 * Time: 上午11:31
 * Issue的service层
 */

class WritingService {

	private $issuemodel;
    private $argumentmodel;

    private $service;

	// 构造函数
	public function __construct () {
        if ($this->service == null) {
            $this->issuemodel = IssueModel::getIssueModel();
            $this->argumentmodel = ArgumentModel::getIssueModel();
        }
	}

	// 获取一篇issue
	public function getAnIssue () {
		$issue = $this->issuemodel->getRandomIssue();

		return $issue;
	}

    // 根据问题ID获取一篇issue
    public function getAnIssueById ($id) {
        $issue = $this->issuemodel->getIssueById($id);

        return $issue[0];
    }

    // 获得最大的issue ID
    public function getMaxIssueId () {
        return $this->issuemodel->getMaxId();
    }

    // 获取一篇argument
    public function getAnArgument () {
        $argument = $this->argumentmodel->getRandomArgument();

        return $argument;
    }

    // 根据问题ID获取一篇argument
    public function getAnArgumentById ($id) {
        $argument = $this->argumentmodel->getArgumentById($id);

        return $argument[0];
    }

    // 获得最大的Argument ID
    public function getMaxArgumentId () {
        return $this->argumentmodel->getMaxId();
    }

}