#!/bin/sh

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
bin=${DIR}/../bin
lib=${DIR}/../lib

echo '
{
    "type" : "jdbc",
    "jdbc" : {
        "url" : "jdbc:mysql://localhost:3306/yii2_shop",
        "user" : "daqi",
        "password" : "daqitech2017",
        "sql" : "select *, productid as _id from shop_product",
        "index" : "yii2_shop",
        "type" : "products",
        "metrics": {
            "enabled" : true
        },
        "elasticsearch" : {
             "cluster" : "yii2-shop-search",
             "host" : "10.168.1.216",
             "port" : 9300
        }   
    }
}
' | java \
    -cp "${lib}/*" \
    -Dlog4j.configurationFile=${bin}/log4j2.xml \
    org.xbib.tools.Runner \
    org.xbib.tools.JDBCImporter
