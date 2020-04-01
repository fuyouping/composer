//java 生成文件命令 .\thrift-0.11.0.exe -r -gen java .\ZktService.thrift
//php 生成文件命令 .\thrift-0.11.0.exe -r -gen php .\ZktService.thrift

namespace java cn.hy.zkt.thrift
namespace php cn.hy.zkt.thrift

/**
 * thrift业务异常，通过code区分异常类型，message返回提示信息
 **/
exception ThriftBusinessException  {
    1: i32 code;
    2: string message;
}

//应用程序接口service
service ZktThriftService {
    /******* 用户信息 *******/
    //根据用户id查询用户信息
    string findUserByUserId(1: string userId) throws (1: ThriftBusinessException ex);

    /******* 权限信息 *******/
    //根据userId、appCode 查询用户在当前学校appCode应用下的权限信息
    string findMenuPermByUserIdAndAppCode(1: string userId, 2: string appCode) throws (1: ThriftBusinessException ex);

}

