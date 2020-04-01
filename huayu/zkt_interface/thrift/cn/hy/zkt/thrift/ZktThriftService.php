<?php
namespace cn\hy\zkt\thrift;
/**
 * Autogenerated by Thrift Compiler (0.11.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


interface ZktThriftServiceIf {
  /**
   * ***** 用户信息 ******
   * 
   * @param string $userId
   * @return string
   * @throws \cn\hy\zkt\thrift\ThriftBusinessException
   */
  public function findUserByUserId($userId);
  /**
   * ***** 权限信息 ******
   * 
   * @param string $userId
   * @param string $appCode
   * @return string
   * @throws \cn\hy\zkt\thrift\ThriftBusinessException
   */
  public function findMenuPermByUserIdAndAppCode($userId, $appCode);
}


class ZktThriftServiceClient implements \cn\hy\zkt\thrift\ZktThriftServiceIf {
  protected $input_ = null;
  protected $output_ = null;

  protected $seqid_ = 0;

  public function __construct($input, $output=null) {
    $this->input_ = $input;
    $this->output_ = $output ? $output : $input;
  }

  public function findUserByUserId($userId)
  {
    $this->send_findUserByUserId($userId);
    return $this->recv_findUserByUserId();
  }

  public function send_findUserByUserId($userId)
  {
    $args = new \cn\hy\zkt\thrift\ZktThriftService_findUserByUserId_args();
    $args->userId = $userId;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'findUserByUserId', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('findUserByUserId', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_findUserByUserId()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\cn\hy\zkt\thrift\ZktThriftService_findUserByUserId_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \cn\hy\zkt\thrift\ZktThriftService_findUserByUserId_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    if ($result->ex !== null) {
      throw $result->ex;
    }
    throw new \Exception("findUserByUserId failed: unknown result");
  }

  public function findMenuPermByUserIdAndAppCode($userId, $appCode)
  {
    $this->send_findMenuPermByUserIdAndAppCode($userId, $appCode);
    return $this->recv_findMenuPermByUserIdAndAppCode();
  }

  public function send_findMenuPermByUserIdAndAppCode($userId, $appCode)
  {
    $args = new \cn\hy\zkt\thrift\ZktThriftService_findMenuPermByUserIdAndAppCode_args();
    $args->userId = $userId;
    $args->appCode = $appCode;
    $bin_accel = ($this->output_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_write_binary');
    if ($bin_accel)
    {
      thrift_protocol_write_binary($this->output_, 'findMenuPermByUserIdAndAppCode', TMessageType::CALL, $args, $this->seqid_, $this->output_->isStrictWrite());
    }
    else
    {
      $this->output_->writeMessageBegin('findMenuPermByUserIdAndAppCode', TMessageType::CALL, $this->seqid_);
      $args->write($this->output_);
      $this->output_->writeMessageEnd();
      $this->output_->getTransport()->flush();
    }
  }

  public function recv_findMenuPermByUserIdAndAppCode()
  {
    $bin_accel = ($this->input_ instanceof TBinaryProtocolAccelerated) && function_exists('thrift_protocol_read_binary');
    if ($bin_accel) $result = thrift_protocol_read_binary($this->input_, '\cn\hy\zkt\thrift\ZktThriftService_findMenuPermByUserIdAndAppCode_result', $this->input_->isStrictRead());
    else
    {
      $rseqid = 0;
      $fname = null;
      $mtype = 0;

      $this->input_->readMessageBegin($fname, $mtype, $rseqid);
      if ($mtype == TMessageType::EXCEPTION) {
        $x = new TApplicationException();
        $x->read($this->input_);
        $this->input_->readMessageEnd();
        throw $x;
      }
      $result = new \cn\hy\zkt\thrift\ZktThriftService_findMenuPermByUserIdAndAppCode_result();
      $result->read($this->input_);
      $this->input_->readMessageEnd();
    }
    if ($result->success !== null) {
      return $result->success;
    }
    if ($result->ex !== null) {
      throw $result->ex;
    }
    throw new \Exception("findMenuPermByUserIdAndAppCode failed: unknown result");
  }

}


// HELPER FUNCTIONS AND STRUCTURES

class ZktThriftService_findUserByUserId_args {
  static $isValidate = false;

  static $_TSPEC = array(
    1 => array(
      'var' => 'userId',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    );

  /**
   * @var string
   */
  public $userId = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['userId'])) {
        $this->userId = $vals['userId'];
      }
    }
  }

  public function getName() {
    return 'ZktThriftService_findUserByUserId_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->userId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ZktThriftService_findUserByUserId_args');
    if ($this->userId !== null) {
      $xfer += $output->writeFieldBegin('userId', TType::STRING, 1);
      $xfer += $output->writeString($this->userId);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class ZktThriftService_findUserByUserId_result {
  static $isValidate = false;

  static $_TSPEC = array(
    0 => array(
      'var' => 'success',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    1 => array(
      'var' => 'ex',
      'isRequired' => false,
      'type' => TType::STRUCT,
      'class' => '\cn\hy\zkt\thrift\ThriftBusinessException',
      ),
    );

  /**
   * @var string
   */
  public $success = null;
  /**
   * @var \cn\hy\zkt\thrift\ThriftBusinessException
   */
  public $ex = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
      if (isset($vals['ex'])) {
        $this->ex = $vals['ex'];
      }
    }
  }

  public function getName() {
    return 'ZktThriftService_findUserByUserId_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->success);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->ex = new \cn\hy\zkt\thrift\ThriftBusinessException();
            $xfer += $this->ex->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ZktThriftService_findUserByUserId_result');
    if ($this->success !== null) {
      $xfer += $output->writeFieldBegin('success', TType::STRING, 0);
      $xfer += $output->writeString($this->success);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ex !== null) {
      $xfer += $output->writeFieldBegin('ex', TType::STRUCT, 1);
      $xfer += $this->ex->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class ZktThriftService_findMenuPermByUserIdAndAppCode_args {
  static $isValidate = false;

  static $_TSPEC = array(
    1 => array(
      'var' => 'userId',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    2 => array(
      'var' => 'appCode',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    );

  /**
   * @var string
   */
  public $userId = null;
  /**
   * @var string
   */
  public $appCode = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['userId'])) {
        $this->userId = $vals['userId'];
      }
      if (isset($vals['appCode'])) {
        $this->appCode = $vals['appCode'];
      }
    }
  }

  public function getName() {
    return 'ZktThriftService_findMenuPermByUserIdAndAppCode_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->userId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->appCode);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ZktThriftService_findMenuPermByUserIdAndAppCode_args');
    if ($this->userId !== null) {
      $xfer += $output->writeFieldBegin('userId', TType::STRING, 1);
      $xfer += $output->writeString($this->userId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->appCode !== null) {
      $xfer += $output->writeFieldBegin('appCode', TType::STRING, 2);
      $xfer += $output->writeString($this->appCode);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class ZktThriftService_findMenuPermByUserIdAndAppCode_result {
  static $isValidate = false;

  static $_TSPEC = array(
    0 => array(
      'var' => 'success',
      'isRequired' => false,
      'type' => TType::STRING,
      ),
    1 => array(
      'var' => 'ex',
      'isRequired' => false,
      'type' => TType::STRUCT,
      'class' => '\cn\hy\zkt\thrift\ThriftBusinessException',
      ),
    );

  /**
   * @var string
   */
  public $success = null;
  /**
   * @var \cn\hy\zkt\thrift\ThriftBusinessException
   */
  public $ex = null;

  public function __construct($vals=null) {
    if (is_array($vals)) {
      if (isset($vals['success'])) {
        $this->success = $vals['success'];
      }
      if (isset($vals['ex'])) {
        $this->ex = $vals['ex'];
      }
    }
  }

  public function getName() {
    return 'ZktThriftService_findMenuPermByUserIdAndAppCode_result';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 0:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->success);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->ex = new \cn\hy\zkt\thrift\ThriftBusinessException();
            $xfer += $this->ex->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ZktThriftService_findMenuPermByUserIdAndAppCode_result');
    if ($this->success !== null) {
      $xfer += $output->writeFieldBegin('success', TType::STRING, 0);
      $xfer += $output->writeString($this->success);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ex !== null) {
      $xfer += $output->writeFieldBegin('ex', TType::STRUCT, 1);
      $xfer += $this->ex->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}


